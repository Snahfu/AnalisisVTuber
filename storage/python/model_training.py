from gensim.models import Word2Vec
from nltk.tokenize import word_tokenize
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.preprocessing import LabelEncoder
import matplotlib.pyplot as plt
import tensorflow as tf
from sklearn.model_selection import train_test_split
from tensorflow.keras.layers import SpatialDropout1D, Bidirectional, LSTM, Dropout, Activation
from tensorflow.keras.preprocessing.text import Tokenizer
from tensorflow.keras.preprocessing.sequence import pad_sequences
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Embedding, LSTM, Dense, BatchNormalization
from tensorflow.keras.callbacks import ModelCheckpoint
from keras.callbacks import EarlyStopping
from transformers import AutoTokenizer, AutoModel

def train_model(dataset_kategori, dataset_sentimen):
    # 2 Untuk Kategori
    # 1 Untuk Sentimen

    category_encoder = LabelEncoder()
    y_category_labels = category_encoder.fit_transform(dataset_kategori['kategori'])
    y_category_labels = tf.keras.utils.to_categorical(y_category_labels, 3)

    sentiment_encoder = LabelEncoder()
    y_sentiment_label = sentiment_encoder.fit_transform(dataset_sentimen['sentimen'])
    y_sentiment_label = tf.keras.utils.to_categorical(y_sentiment_label, 3)

    print("selesai encoding")
    X_train, X_test, y_train, y_test = train_test_split(dataset_sentimen['comments'], y_sentiment_label, test_size=0.2, random_state = 42)
    X_train2, X_test2, y_train2, y_test2 = train_test_split(dataset_kategori['comments'], y_category_labels, test_size=0.2, random_state = 42)

    longestSentence = 0
    for x in X_train:
        if (len(x) > longestSentence):
            longestSentence = len(x)
    max_length = longestSentence

    longestSentence2 = 0
    for x in X_train2:
        if (len(x) > longestSentence2):
            longestSentence2 = len(x)
    max_length2 = longestSentence2

    # Menggunakan Indobert
    auto_tokenizer = AutoTokenizer.from_pretrained("indolem/indobertweet-base-uncased")
    indobert_model = AutoModel.from_pretrained("indolem/indobertweet-base-uncased")
    
    # Tokenizing dan Padding pada Train Dataset
    tokenized_data_train2 = auto_tokenizer(
        X_train2.tolist(),
        padding=True,
        truncation=True,
        return_tensors="tf",
        max_length=max_length2
    )

    tokenized_data_test2 = auto_tokenizer(
        X_test2.tolist(),
        padding=True,
        truncation=True,
        return_tensors="tf",
        max_length=max_length2
    )

    tokenized_data_train = auto_tokenizer(
        X_train.tolist(),
        padding=True,
        truncation=True,
        return_tensors="tf",
        max_length=max_length
    )

    tokenized_data_test = auto_tokenizer(
        X_test.tolist(),
        padding=True,
        truncation=True,
        return_tensors="tf",
        max_length=max_length
    )
    # Menggunakan Indobert sebagai embedding layer sehingga mengambil matrixnya untuk digunakan sbg weights
    def get_bert_embed_matrix():
        bert = AutoModel.from_pretrained("indolem/indobertweet-base-uncased")
        bert_embeddings = list(bert.children())[0]
        bert_word_embeddings = list(bert_embeddings.children())[0]
        mat = bert_word_embeddings.weight.data.numpy()
        return mat
    
    embedding_size = indobert_model.config.hidden_size
    embedding_matrix = get_bert_embed_matrix()

    # Pembuatan Model
    model2 = Sequential()
    model2.add(Embedding(input_dim=auto_tokenizer.vocab_size, output_dim=embedding_size, weights=[embedding_matrix]))
    model2.add(SpatialDropout1D(rate=0.2))
    model2.add(Bidirectional(LSTM(96, dropout=0.4, recurrent_dropout=0.2)))
    model2.add(Dense(units=128))
    model2.add(BatchNormalization())
    model2.add(Activation('relu'))
    model2.add(Dropout(rate=0.2))
    model2.add(Dense(units=64))
    model2.add(BatchNormalization())
    model2.add(Activation('relu'))
    model2.add(Dropout(rate=0.2))
    model2.add(Dense(units=192))
    model2.add(BatchNormalization())
    model2.add(Activation('relu'))
    model2.add(Dropout(rate=0.4))
    model2.add(Dense(3, name='output_dense', activation ='softmax'))
    model2.summary()
    model2.compile(loss='categorical_crossentropy', optimizer='adam', metrics=['accuracy'])

    stop_early = EarlyStopping(patience=10, verbose=1, restore_best_weights=True)
    trained_model2 = model2.fit(tokenized_data_train2['input_ids'], y_train2, epochs=10, batch_size=64, validation_data=(tokenized_data_test2['input_ids'], y_test2), callbacks=[stop_early])


    model = Sequential()
    model.add(Embedding(input_dim=auto_tokenizer.vocab_size, output_dim=embedding_size, weights=[embedding_matrix]))
    model.add(SpatialDropout1D(rate=0.4))
    model.add(Bidirectional(LSTM(160, dropout=0.4, recurrent_dropout=0.2)))
    model.add(Dense(units=64))
    model.add(BatchNormalization())
    model.add(Activation('relu'))
    model.add(Dropout(rate=0.2))
    model.add(Dense(units=448))
    model.add(BatchNormalization())
    model.add(Activation('relu'))
    model.add(Dropout(rate=0.2))
    model.add(Dense(units=384))
    model.add(BatchNormalization())
    model.add(Activation('relu'))
    model.add(Dropout(rate=0.4))
    model.add(Dense(3, name='output_dense', activation ='softmax'))
    model.summary()
    model.compile(loss='categorical_crossentropy', optimizer='adam', metrics=['accuracy'])

    trained_model = model.fit(tokenized_data_train['input_ids'], y_train, epochs=10, batch_size=64, validation_data=(tokenized_data_test['input_ids'], y_test), callbacks=[stop_early])
    # Save Model ke lokasi ...
    model.save("model_terbaik_sentimen.h5")
    model2.save("model_terbaik_kategori.h5")
    
    return "Sukses Melakukan Train Ulang"

    

