from flask import Flask, request, jsonify
from instagram_comment import instagram_crawling
from youtube_comment import youtube_crawling
from flask_cors import CORS
from urllib.parse import urlparse, parse_qs

app = Flask(__name__)
CORS(app)

@app.route("/")
def index():
    return "Hello World!"

@app.route("/crawling", methods=["POST"])
def crawling():
    data = request.get_json()
    
    result = []
    msg = ""
    status = "success"

    if 'sumber' in data and 'url' in data:
        sumber = data['sumber']
        url = data['url']
        
        try:
            if (sumber == "instagram"):
                kode_unik = extract_instagram_post_id(url)
                result = instagram_crawling(kode_unik)
            else :
                kode_unik = extract_youtube_video_id(url)
                result = youtube_crawling(kode_unik)
        except Exception as e:
            msg = str(e)
            status = "error"
    else:
        msg = "Tidak ditemukan 'sumber' dan 'url' sebagai parameter"
        status = "error"

    # Kembalikan hasil, pesan, dan status
    return jsonify({"result": result, "msg": msg, "status": status, "data": data})

@app.route("/train-model", methods=["POST"])
def train_model():
    data = request.get_json()
    

    result = []
    msg = ""
    status = "success"

    if 'ArrayKomentar' in data and isinstance(data['ArrayKomentar'], list):
        array_komentar = data['ArrayKomentar']

        try:
            result = "Model trained successfully."
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
        return None

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
        return None

if __name__ == "__main__":
    app.run(debug=True)