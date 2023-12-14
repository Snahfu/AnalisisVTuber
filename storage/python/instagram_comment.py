#Import Important Library for Chrome
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
from bs4 import BeautifulSoup as bs
from bs4 import Tag
import time
from datetime import datetime
import pandas as pd
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

# FUNCTION BUAT AMBIL DATA POST/VIDEO
def scrape_post(driver, selector_caption, selector_total_like, selector_timestamp, selector_creator, bs):
    scraped_data = {"captions": [], "total_like": [], "timestamp": [], "creator": []}
    try:
        # Tunggu hingga elemen muncul
        element_caption = WebDriverWait(driver, 1).until(
            EC.presence_of_element_located((By.CSS_SELECTOR, selector_caption))
        )
        element_total_like = WebDriverWait(driver, 1).until(
            EC.presence_of_element_located((By.CSS_SELECTOR, selector_total_like))
        )
        element_timestamp = WebDriverWait(driver, 1).until(
            EC.presence_of_element_located((By.CSS_SELECTOR, selector_timestamp))
        )
        element_creator = WebDriverWait(driver, 1).until(
            EC.presence_of_element_located((By.CSS_SELECTOR, selector_creator))
        )
        
        # Temukan elemen target
        target_element_caption = bs.select_one(selector_caption)
        target_element_total_like = bs.select_one(selector_total_like)
        target_element_timestamp = bs.select_one(selector_timestamp)
        target_element_creator = bs.select_one(selector_creator)
        
        # Ambil teks dari elemen target
        text_caption = target_element_caption.get_text(strip=True) if target_element_caption else " "
        text_creator = target_element_creator.get_text(strip=True) if target_element_creator else " "
        text_total_like = target_element_total_like.get_text(strip=True) if target_element_total_like else "0 likes"
        if(target_element_timestamp):
            text_timestamp = target_element_timestamp.get('datetime')
            # Step ubah datetime ke format database
            text_timestamp = datetime.fromisoformat(text_timestamp.replace("Z", "+00:00"))
            database_timestamp = text_timestamp.strftime("%Y-%m-%d %H:%M:%S")
        else:
            database_timestamp = "tidak ditemukan"

        scraped_data["captions"].append(text_caption)
        scraped_data["creator"].append(text_creator)
        scraped_data["total_like"].append(text_total_like+" likes")
        scraped_data["timestamp"].append(database_timestamp)
        
    except Exception as e:
        scraped_data["captions"].append("error")
        scraped_data["creator"].append("error")
        scraped_data["total_like"].append("0 likes")
        scraped_data["timestamp"].append("error")

    return scraped_data

# FUNCTION BUAT AMBIL DATA KOMENTAR
def scrape_with_bs(driver, selector_comment, selector_author, selector_likes, selector_datetime, total_items, bs):
    # Inisialisasi list untuk menampung hasil scraping
    scraped_texts = {"comments": [], "authors": [], "likes": [], "datetimes": []}

    for i in range(1, total_items + 1):
        try:
            # Ganti nilai N dalam selector dengan iterasi saat ini
            current_selector_comment = selector_comment.replace('N', str(i))
            current_selector_author = selector_author.replace('N', str(i))
            current_selector_likes = selector_likes.replace('N', str(i))
            current_selector_datetime = selector_datetime.replace('N', str(i))

            # Tunggu hingga elemen muncul
            element_comment = WebDriverWait(driver, 1).until(
                EC.presence_of_element_located((By.CSS_SELECTOR, current_selector_comment))
            )
            element_author = WebDriverWait(driver, 1).until(
                EC.presence_of_element_located((By.CSS_SELECTOR, current_selector_author))
            )
            element_likes = WebDriverWait(driver, 1).until(
                EC.presence_of_element_located((By.CSS_SELECTOR, current_selector_likes))
            )
            element_datetime = WebDriverWait(driver, 1).until(
                EC.presence_of_element_located((By.CSS_SELECTOR, current_selector_datetime))
            )

            # Temukan elemen target
            target_element_comment = bs.select_one(current_selector_comment)
            target_element_author = bs.select_one(current_selector_author)
            target_element_likes = bs.select_one(current_selector_likes)
            target_element_datetime = bs.select_one(current_selector_datetime)

            # Ambil teks dari elemen target
            text_comment = target_element_comment.get_text(strip=True) if target_element_comment else "ini gambar"
            text_author = target_element_author.get_text(strip=True) if target_element_author else "ini gambar"
            text_likes = target_element_likes.get_text(strip=True) if target_element_likes else "ini gambar"
            if(target_element_likes.get_text(strip=True) == "Reply"):
                text_likes = "0 likes"
            if(target_element_datetime):
                text_datetime = target_element_datetime.get('datetime')
                # Step ubah datetime ke format database
                text_datetime = datetime.fromisoformat(text_datetime.replace("Z", "+00:00"))
                database_timestamp = text_datetime.strftime("%Y-%m-%d %H:%M:%S")
            else:
                database_timestamp = "ini gambar"

            # Tambahkan ke dalam list
            scraped_texts["comments"].append(text_comment)
            scraped_texts["authors"].append(text_author)
            scraped_texts["likes"].append(text_likes)
            scraped_texts["datetimes"].append(database_timestamp)

        except Exception as e:
            # Handle exception jika ada masalah saat scraping
            scraped_texts["comments"].append("ini gambar")
            scraped_texts["authors"].append("ini gambar")
            scraped_texts["likes"].append("0 likes")
            scraped_texts["datetimes"].append("ini gambar")

    return scraped_texts

#Function buat scroll down
def scroll_down(element, chromedriver):
    chromedriver.execute_script('arguments[0].scrollTop = arguments[0].scrollHeight;', element)


def instagram_crawling(instagram_url):
    # Open Chrome Driver 
    service = Service(executable_path='./chromedriver.exe')

    options = webdriver.ChromeOptions()

    driver = webdriver.Chrome(service=service, options=options)
    driver.maximize_window()

    # Open Instagram, Login to dummy user
    driver.implicitly_wait(1)
    driver.get('https://www.instagram.com/')
    time.sleep(1)
    username_input = driver.find_element(By.XPATH, "//input[@name='username']")
    password_input = driver.find_element(By.XPATH, "//input[@name='password']")
    username_input.send_keys("hans_dev_testing")
    password_input.send_keys("ubaya_20")
    login_button = driver.find_element(By.XPATH,"//button[@type='submit']")
    login_button.click()
    time.sleep(5)
    save_button = driver.find_element(By.XPATH,"//button[@type='button']")
    save_button.click()
    time.sleep(5)

    # Crawling Starts
    driver.get('https://www.instagram.com/p/'+instagram_url+'/?hl=en')
    # OLD
    # scrollableDiv = driver.find_element(By.XPATH, "//html/body/div[2]/div/div/div[2]/div/div/div/div[1]/div[1]/div[2]/section/main/div/div[1]/div/div[2]/div/div[2]")
    # NEW
    scrollableDiv = driver.find_element(By.XPATH, "/html/body/div[2]/div/div/div[2]/div/div/div[1]/div[1]/div[2]/section/main/div/div[1]/div/div[2]/div/div[2]")
    # ITERASI PERTAMA itu 13 + (1 milik CAPTION) TOTAL 14 yg ke-15 itu Loading State + 15 berikutnya

    # LOOPING setidaknya 8x
    for _nothing in range (12):
        #Jalankan function
        scroll_down(scrollableDiv, driver)
        #Sleep 3 detik
        time.sleep(3)

    #MEMBUAT OBJEK BEAUTIFUL SOUP
    html = driver.page_source
    data = bs(html, 'html.parser')

    # Menghitung banyaknya komentar setelah melakukan scroll sampai bawah
    selector = "div:nth-of-type(2) > div > div > div:nth-of-type(2) > div > div > div:nth-of-type(1) > div:nth-of-type(1) > div:nth-of-type(2) > section > main > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div"
    elements = data.select(selector)
    banyak_komentar = len(elements)

    # Mengambil data dan menyimpan di results
    selector_listkomentar = "div:nth-of-type(2) > div > div > div:nth-of-type(2) > div > div > div:nth-of-type(1) > div:nth-of-type(1) > div:nth-of-type(2) > section > main > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div:nth-of-type(N) > div > div > div:nth-of-type(2) > div:nth-of-type(1) > div:nth-of-type(1) > div > div:nth-of-type(2) > span"
    selector_listnama = "div:nth-of-type(2) > div > div > div:nth-of-type(2) > div > div > div:nth-of-type(1) > div:nth-of-type(1) > div:nth-of-type(2) > section > main > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div:nth-of-type(N) > div > div > div:nth-of-type(2) > div:nth-of-type(1) > div:nth-of-type(1) > div > div:nth-of-type(1) > span:nth-of-type(1) > span > div > a > div > div > span"
    selector_listlike = "div:nth-of-type(2) > div > div > div:nth-of-type(2) > div > div > div:nth-of-type(1) > div:nth-of-type(1) > div:nth-of-type(2) > section > main > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div:nth-of-type(N) > div > div > div:nth-of-type(2) > div:nth-of-type(1) > div:nth-of-type(2) > div:nth-of-type(1) > span > span"
    selector_listtime = "div:nth-of-type(2) > div > div > div:nth-of-type(2) > div > div > div:nth-of-type(1) > div:nth-of-type(1) > div:nth-of-type(2) > section > main > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div:nth-of-type(N) > div > div > div:nth-of-type(2) > div:nth-of-type(1) > div:nth-of-type(1) > div > div:nth-of-type(1) > span:nth-of-type(2) > a > time"
    #def scrape_with_bs(driver, selector_comment, selector_author, selector_likes, selector_datetime, total_items, bs):
    results = scrape_with_bs(driver, selector_listkomentar, selector_listnama, selector_listlike, selector_listtime, banyak_komentar, data)

    # Mengambil data post
    #LIKE COUNT, TIME, SOURCE, CREATOR NAME, TITLE/CAPTION
    selector_caption = "div:nth-of-type(2) > div > div > div:nth-of-type(2) > div > div > div:nth-of-type(1) > div:nth-of-type(1) > div:nth-of-type(2) > section > main > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > span > div > span"
    selector_total_like = "div:nth-of-type(2) > div > div > div:nth-of-type(2) > div > div > div:nth-of-type(1) > div:nth-of-type(1) > div:nth-of-type(2) > section > main > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > div:nth-of-type(3) > section > div > div > span > a > span > span"
    selector_timestamp = "div:nth-of-type(2) > div > div > div:nth-of-type(2) > div > div > div:nth-of-type(1) > div:nth-of-type(1) > div:nth-of-type(2) > section > main > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > div:nth-of-type(3) > div:nth-of-type(2) > div > a > span > time"
    selector_creator = "div:nth-of-type(2) > div > div > div:nth-of-type(2) > div > div > div:nth-of-type(1) > div:nth-of-type(1) > div:nth-of-type(2) > section > main > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > div:nth-of-type(2) > div > div:nth-of-type(1) > div > div:nth-of-type(2) > div > span > div > div > span:nth-of-type(1) > div > a > div > div > span"
    # def scrape_post(driver, selector_caption, selector_total_like, selector_timestamp,selector_creator, bs):
    posts = scrape_post(driver, selector_caption, selector_total_like, selector_timestamp, selector_creator, data)
    # Tutup Chrome Driver 
    driver.quit()

    merged_data = {**results, **posts}
    
    # Return
    return merged_data