from tensorflow.keras.models import load_model
from transformers import AutoTokenizer, AutoModel
import numpy as np
import pandas as pd
from preprocessing import preprocessing_step

def predict_sentimen(list_komentar):
    model_sentimen = load_model("model_terbaik_sentimen.h5")
    auto_tokenizer = AutoTokenizer.from_pretrained("indolem/indobertweet-base-uncased")

    longestSentence = 0
    for x in list_komentar.tolist():
        if (len(x) > longestSentence):
            longestSentence = len(x)
    max_length = longestSentence

    tokenized_data_predict = auto_tokenizer(
        list_komentar.tolist(),
        padding=True,
        truncation=True,
        return_tensors="tf",
        max_length=max_length
    )
    hasil_prediksi = model_sentimen.predict(tokenized_data_predict['input_ids'])
    kelas_terprediksi  = np.argmax(hasil_prediksi, axis = 1)
    y_list = ['Negatif', 'Netral', 'Positif']

    result = pd.DataFrame({'Comment_Sentimen': list_komentar.tolist(), 'Sentimen': [y_list[i] for i in kelas_terprediksi]})
    return result

def predict_kategori(list_komentar):
    model_kategori = load_model("model_terbaik_kategori.h5")
    auto_tokenizer = AutoTokenizer.from_pretrained("indolem/indobertweet-base-uncased")
    
    longestSentence = 0
    for x in list_komentar.tolist():
        if (len(x) > longestSentence):
            longestSentence = len(x)
    max_length = longestSentence

    tokenized_data_predict = auto_tokenizer(
        list_komentar.tolist(),
        padding=True,
        truncation=True,
        return_tensors="tf",
        max_length=max_length
    )
    hasil_prediksi = model_kategori.predict(tokenized_data_predict['input_ids'])
    kelas_terprediksi  = np.argmax(hasil_prediksi, axis = 1)
    y_list = ['Engagement', 'Feedback', 'Pertanyaan']

    result = pd.DataFrame({'Comment_Kategori': list_komentar.tolist(), 'Kategori': [y_list[i] for i in kelas_terprediksi]})

    return result

def predict_komentar(data_komentar):
    komentar_kategori, komentar_sentimen = preprocessing_step(data_komentar)
    hasil_kategori = predict_kategori(komentar_kategori)
    hasil_sentimen = predict_sentimen(komentar_sentimen)

    return hasil_kategori, hasil_sentimen
    
    

