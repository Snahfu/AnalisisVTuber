from googleapiclient.discovery import build
from datetime import datetime

def video_comments(video_id, api_secret_key, result):
    youtube = build('youtube', 'v3',developerKey=api_secret_key)


    # Add a try/except block to handle errors
    try:
        video_response=youtube.commentThreads().list(part='snippet,replies',videoId=video_id).execute()

        # Looping hasil video_response
        while video_response:
            # Looping setiap item
            for item in video_response['items']:
                comments_data = {}
                replies_data = {}

                temporary_datetime = item['snippet']['topLevelComment']['snippet']['publishedAt']
                text_timestamp = datetime.fromisoformat(temporary_datetime.replace("Z", "+00:00"))
                database_timestamp = text_timestamp.strftime("%Y-%m-%d %H:%M:%S")
                comments_data['publishedAt'] = database_timestamp

                result['comments'].append(item['snippet']['topLevelComment']['snippet']['textDisplay'])
                result['comments_like'].append(item['snippet']['topLevelComment']['snippet']['likeCount'])
                result['comments_author'].append(item['snippet']['topLevelComment']['snippet']['authorDisplayName'])
                result['comments_date'].append(comments_data['publishedAt'])

                ### CEK APAKAH ADA REPLY?
                replycount = item['snippet']['totalReplyCount']

                if replycount>0:
                    for reply in item['replies']['comments']:
                        
                        datetime_reply = reply['snippet']['publishedAt']
                        text_timestamp = datetime.fromisoformat(datetime_reply.replace("Z", "+00:00"))
                        database_timestamp = text_timestamp.strftime("%Y-%m-%d %H:%M:%S")
                        replies_data['publishedAt'] = database_timestamp

                        result['comments'].append(reply['snippet']['textDisplay'])
                        result['comments_like'].append(reply['snippet']['likeCount'])
                        result['comments_author'].append(reply['snippet']['authorDisplayName'])
                        result['comments_date'].append(comments_data['publishedAt'])

            # Komentar dari API Youtube dibuat dalam page jadi perlu di loop lagi kalau lebih dari 50
            if 'nextPageToken' in video_response:
                video_response = youtube.commentThreads().list(part = 'snippet,replies',videoId = video_id,pageToken = video_response['nextPageToken']).execute()
            else:
                break

    except Exception as e:
        print(f"Error: {e}")


def video_data(video_id, api_secret_key, result):
    youtube = build('youtube', 'v3', developerKey=api_secret_key)
    try:
        video_response = youtube.videos().list(
            part='snippet,statistics',
            id=video_id
        ).execute()

        video_info = video_response['items'][0]['snippet']
        video_statistic = video_response['items'][0]['statistics']

        video_title = video_info['title']
        video_creator = video_info['channelTitle']
        video_caption = video_info['description']
        temporary_datetime = video_info['publishedAt']
        text_timestamp = datetime.fromisoformat(temporary_datetime.replace("Z", "+00:00"))
        video_published_date = text_timestamp.strftime("%Y-%m-%d %H:%M:%S")

        result['like_count'].append(video_statistic['likeCount'])
        result['creator'].append(video_creator)
        result['title'].append(video_title)
        result['caption'].append(video_caption)
        result['published_date'].append(video_published_date)

    except Exception as e:
        print(f"An error occurred: {e}")

def youtube_crawling(youtube_id):
    # API KEY from Google
    api_key = 'AIzaSyCwUou2DhU3oQGKaIsi6bdS3YG-2FMO908'

    result = {
        "video_id": [],
        "title": [],
        "creator": [],
        "caption": [],
        "like_count": [],
        "published_date": [],
        "comments": [],
        "comments_like": [],
        "comments_date": [],
        "comments_author": [],
    }
    result['video_id'].append(youtube_id)

    video_comments(youtube_id, api_key, result)

    video_data(youtube_id, api_key, result)

    return result

