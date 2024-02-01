from flask import Flask, request, jsonify
from instagram_comment import instagram_crawling
from youtube_comment import youtube_crawling
from model_predict import predict_komentar
from preprocessing_train import preprocessing_traindataset
from model_training import train_model
from flask_cors import CORS, cross_origin
from urllib.parse import urlparse, parse_qs
import pandas as pd

app = Flask(__name__)
CORS(app)

@app.route("/")
def index():
    return "Hello World!"

@app.route("/crawling", methods=["POST"])
@cross_origin()
def crawling():
    data = request.get_json()
    
    result = []
    msg = "berhasil melakukan crawling"
    status = "success"
    final_result = "gagal"
    sentiment_chart = ""
    category_chart = ""
    kode_unik = ""
    title = ""
    caption = ""
    creator = ""
    tanggal = ""
    jumlah_like = ""

    if 'sumber' in data and 'url' in data:
        sumber = data['sumber']
        url = data['url']
        
        try:
            if (sumber == "Instagram"):
                kode_unik = extract_instagram_post_id(url)
                if(kode_unik == "Format URL yang dimasukan salah!"):
                    return jsonify(
                        {
                            "msg": kode_unik,
                            "status": "failed", 
                        }
                    )
                result = instagram_crawling(kode_unik)
                
                comments_list = result["comments"] #Sudah dalam bentuk List Komentar
                comments_date_list = result["datetimes"]
                comments_author_list = result["authors"]
                comments_like_list = result["likes"]
                title = result["captions"]
                caption = [" "]
                creator = result["creator"]
                tanggal = result["timestamp"]
                jumlah_like = result["total_like"]

                df_dataset = pd.DataFrame(comments_list, columns=["komentar"])
                hasil_kategori, hasil_sentimen = predict_komentar(df_dataset)
            else :
                kode_unik = extract_youtube_video_id(url)
                if(kode_unik == "Format URL yang dimasukan salah!"):
                    return jsonify(
                        {
                            "msg": kode_unik,
                            "status": "failed", 
                        }
                    )
                result = youtube_crawling(kode_unik)

                comments_list = result["comments"] #Sudah dalam bentuk List Komentar
                comments_date_list = result["comments_date"]
                comments_author_list = result["comments_author"]
                comments_like_list = result["comments_like"]
                title = result["title"]
                caption = result["caption"]
                creator = result["creator"]
                tanggal = result["published_date"]
                jumlah_like = result["like_count"]

                df_dataset = pd.DataFrame(comments_list, columns=["komentar"])
                
                hasil_kategori, hasil_sentimen = predict_komentar(df_dataset)
            
            df_date = pd.DataFrame(comments_date_list, columns=["datetimes"])
            df_author = pd.DataFrame(comments_author_list, columns=["authors"])
            df_like = pd.DataFrame(comments_like_list, columns=["likes"])
            df_result = pd.concat([df_dataset, df_date, df_author, df_like, hasil_kategori, hasil_sentimen], axis=1)
            
            df_result = df_result[df_result['Comment_Kategori'].str.strip() != '']
            df_result = df_result[df_result['Comment_Sentimen'].str.strip() != '']
            
            final_result = df_result.to_dict(orient='records')
            sentiment_index = ['Positif', 'Negatif', 'Netral']
            category_index = ['Engagement', 'Feedback', 'Pertanyaan']
            count_sentiment = df_result['Sentimen'].value_counts()
            count_category = df_result['Kategori'].value_counts()

            sentiment_chart = count_sentiment.reindex(sentiment_index, fill_value=0)
            category_chart = count_category.reindex(category_index, fill_value=0)
            sentiment_chart = sentiment_chart.to_dict()
            category_chart = category_chart.to_dict()


        except Exception as e:
            msg = str(e)
            status = "error"

    else:
        msg = "Tidak ditemukan 'sumber' dan 'url' sebagai parameter"
        status = "error"

    return jsonify(
            {
                "result": final_result,
                "msg": msg,
                "status": status, 
                "sentiment_chart": sentiment_chart, 
                "category_chart": category_chart,
                "title": title,
                "caption": caption,
                "creator": creator,
                "sourcesId": kode_unik,
                "date": tanggal,
                "like_count": jumlah_like,
            }
        )

@app.route("/train-model", methods=["POST"])
def build_new_model():
    data = request.get_json()
    
    result = "Training Model Gagal"
    msg = ""
    status = "failed"

    if 'ArrayKomentar' in data and isinstance(data['ArrayKomentar'], list):
        array_komentar = data['ArrayKomentar']
        try:
            df_dataset = pd.DataFrame(array_komentar)
            df_dataset = df_dataset.rename(columns={'text': 'comments'})
            df_dataset = df_dataset.rename(columns={'kelas_sentimen': 'sentimen'})
            df_dataset = df_dataset.rename(columns={'kelas_kategori': 'kategori'})
            data = pd.read_csv('validasi_dataset_validated.csv')
            df_train_dataset = pd.concat([data, df_dataset], ignore_index=True)
            dataset_kategori, dataset_sentimen = preprocessing_traindataset(df_train_dataset)

            result = train_model(dataset_kategori, dataset_sentimen)
            status = "success"
        except Exception as e:
            msg = str(e)
            status = "error"
    else:
        msg = "Invalid request format. 'ArrayKomentar' as a list is required."
        status = "error"

    return jsonify({"result": result, "msg": msg, "status": status})

def extract_youtube_video_id(url):
    parsed_url = urlparse(url)
    
    if parsed_url.netloc == 'www.youtube.com' and parsed_url.path == '/watch':
        query_params = parse_qs(parsed_url.query)
        video_id = query_params.get('v', [None])[0]
        return video_id
    else:
        return "Format URL yang dimasukan salah!"

# def extract_youtube_video_id(url):
#     parsed_url = urlparse(url)
    
#     if parsed_url.netloc == 'www.youtube.com':
#         if parsed_url.path == '/watch':
#             query_params = parse_qs(parsed_url.query)
#             video_id = query_params.get('v', [None])[0]
#             return video_id
#         elif parsed_url.path.startswith('/shorts/'):
#             video_id = parsed_url.path.split('/shorts/')[1]
#             return video_id
#     return None

def extract_instagram_post_id(url):
    parsed_url = urlparse(url)
    
    if parsed_url.netloc == 'www.instagram.com' and parsed_url.path.startswith('/p/'):
        post_id = parsed_url.path.split('/')[2]
        return post_id
    else:
        return "Format URL yang dimasukan salah!"

if __name__ == "__main__":
    try:
        app.run(debug=True)
    except Exception as e:
        print(f"Error: {e}")