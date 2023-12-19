import pandas as pd
import re
import nltk
from nltk.corpus import stopwords
from bs4 import BeautifulSoup
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory

def remove_html_tag(text):
    if text is None:
        return text
    
    soup = BeautifulSoup(text, 'html.parser')
    return soup.get_text(separator=' ', strip=True)

def emoji_converter(text):
    if text is None:
        return text
    
    converted_text = text
    sentiment_dictionary = {
        '😁': ' senang ',
        '😊': ' senyum ',
        '😢': ' sedih ',
        '😋': ' senyum ',
        '😂': ' tertawa ',
        '❤️': ' cinta ',
        '💖': ' suka ',
        '😍': ' suka ',
        '🤍': ' suka ',
        '😭': ' sedih ',
        '🔥': ' semangat ',
        '💀': ' kecewa ',
        '😎': ' keren ',
        '😱': ' kecewa ',
        '✨': ' bagus ',
        '🤣': ' tertawa ',
        '🤮': ' jijik ',
        '😆': ' tertawa ',
        '🤬': ' marah ',
        '💩': ' jelek ',
        '😡': ' marah ',
        '🤔': ' bingung ',
        '👍': ' bagus '
    }

    emoji_dictionary = {
        ':(': ' sedih ',
        ':)': ' senang ',
        ';(': ' sedih ',
        ';)': ' senang ',
        ':D': ' gembira ',
        'D:': ' kecewa ',
        ';D': ' gembira ',
        'D;': ' kecewa ',
    }

    for emoji, sentiment_label in sentiment_dictionary.items():
        converted_text = converted_text.replace(emoji, sentiment_label)

    for emoji, emoji_label in emoji_dictionary.items():
        converted_text = converted_text.replace(emoji, emoji_label)

    return converted_text

def replace_slang(text):
    if text is None:
        return text
    
    slang_dict = {
        'plis': 'please',
        'cb': 'coba',
        'chara': 'character',
        'smoga': 'semoga',
        'tpi': 'tapi',
        'lgi': 'lagi',
        'ngk': 'nggak',
        'pake': 'pakai',
        'nnti': 'nanti',
        'smpe': 'sampai',
        'kmu': 'kamu',
        'emng': 'emang',
        'emg': 'emang',
        'km': 'kamu',
        'ni': 'nih',
        'brp': 'berapa',
        'poto': 'foto',
        'banh': 'bang',
        'hadu': 'haduh',
        '4no': 'porno',
        'trnyata': 'ternyata',
        'si': 'sih',
        'ad': 'ada',
        'gwe': 'gw',
        'jngn': 'jangan',
        'gtu': 'gitu',
        'pls': 'please',
        'raiso': 'nggak bisa',
        'cu': 'cuk',
        'co': 'cok',
        'prik': 'freak',
        'nga': 'nggak',
        'nabok': 'nampar',
        'aq': 'aku',
        'asek': 'asik',
        'klo': 'kalau',
        'kalo': 'kalau',
        'ygy': 'ya ges ya',
        'ikz': 'ikuzo',
        'sangad': 'sangat',
        'gilak': 'gila',
        'mw': 'mau',
        'pgn': 'pengen',
        'wangy': 'wangi',
        'sy': 'saya',
        'yt': 'youtube',
        'ny': 'nya',
        'jgn': 'jangan',
        'nt': 'nice try',
        'udh': 'sudah',
        'gabisa': 'gak bisa',
        'kl': 'kalau',
        'utk': 'untuk',
        'tak': 'tidak',
        'bgt': 'banget',
        'bingit': 'banget',
        'bab': 'buang air besar',
        'ga': 'gak',
        'ges': 'guys',
        'geys': 'guys',
        'ku': 'aku',
        'gemoy': 'gemas',
        'ajah': 'saja',
        'lo': 'loh',
        'lu': 'kamu',
        'SUS': 'mencurigakan',
        'salfok': 'gagal fokus',
        'udh': 'sudah',
        'kek': 'seperti',
        'kyk': 'seperti',
        'kayak': 'seperti',
        'org': 'orang',
        'ae': 'saja',
        'aja': 'saja',
        'lewd': 'cabul'
    }

    return ' '.join(slang_dict.get(word, word) for word in text.split())

def remove_emoji(text):
    if text is None:
        return text

    emoji_pattern = re.compile("["
                               u"\U0001F600-\U0001F64F"  
                               u"\U0001F300-\U0001F5FF"  
                               u"\U0001F680-\U0001F6FF"  
                               u"\U0001F700-\U0001F77F"  
                               u"\U0001F780-\U0001F7FF"  
                               u"\U0001F800-\U0001F8FF"  
                               u"\U0001F900-\U0001F9FF"  
                               u"\U0001FA00-\U0001FA6F"  
                               u"\U0001FA70-\U0001FAFF"  
                               u"\U00002702-\U000027B0"  
                               u"\U000024C2-\U0001F251"
                               "]+", flags=re.UNICODE)
    return emoji_pattern.sub(r' ', text)

def cleaning_process(text):
    if text is None:
        return text
    
    result = re.sub(r'http[s]?://(?:[a-zA-Z]|[0-9]|[$-_@.&+]|[!*\\(\\),]|(?:%[0-9a-fA-F][0-9a-fA-F]))+', ' ', text)#link url
    result = re.sub('[0-9]+', ' ', result)#angka
    return result.strip()

def remove_usermention(text):
    if text is None:
        return text
    
    pattern = r'@[a-zA-Z0-9_.]+'

    result = re.sub(pattern, ' ', text)

    return result.strip()

def stem_text(text):
    if text is None:
        return text
    # Create a Sastrawi stemmer
    factory = StemmerFactory()
    stemmer = factory.create_stemmer()
    return stemmer.stem(text)

#DEFINE STOPWORDS FUNCTION
def clean_stopwords(text):
    if text is None:
        return text
    
    # DEFINE STOPWORDS
    stop_words = set(stopwords.words('indonesian'))
    tambahan_stopwords = {

    }
    stop_words.update(tambahan_stopwords)
    stopword_preprocessing = set(stop_words)

    return " ".join([word for word in str(text).split() if word not in stopword_preprocessing])

def preprocessing_step(train_dataframe):
    # Remove html tag
    # Convert Emoji -> Sentimen
    # SLANG Conversion
    # Lowercase
    # Hapus Emoji
    # Remove Link, Angka, Mention
    # Remove Special Character 1 (Semua tanpa petik 1 satu)
    # Remove Special Character 2 (Semua termasuk petik 1 satu)
    # Stemming
    # Stopword
    nltk.download('stopwords')
    train_dataframe = train_dataframe['komentar'].apply(remove_html_tag)
    train_dataframe = train_dataframe.apply(emoji_converter)
    train_dataframe = train_dataframe.str.lower()
    train_dataframe = train_dataframe.apply(replace_slang)
    train_dataframe = train_dataframe.apply(remove_emoji)
    train_dataframe = train_dataframe.apply(cleaning_process)
    train_dataframe = train_dataframe.apply(remove_usermention)

    punctuations_to_remove = '!"#$%&\*+,-.(:;)/<=>?@[\\]^_`{|}~'
    train_dataframe = train_dataframe.str.replace(f'[{re.escape(punctuations_to_remove)}]', ' ')

    punctuations_to_remove2 = '!"#$%&\'*+,-.(:;)/<=>?@[\\]^_`{|}~'
    train_dataframe = train_dataframe.str.replace(f'[{re.escape(punctuations_to_remove2)}]', '')
    
    train_kategori = train_sentimen = train_dataframe.copy()
    train_sentimen = train_sentimen.apply(stem_text)
    train_sentimen = train_sentimen.apply(clean_stopwords)

    return train_kategori, train_sentimen
    


    