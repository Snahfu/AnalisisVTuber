from googleapiclient.discovery import build

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

                # Ambil comments
                comments_data['textDisplay'] = item['snippet']['topLevelComment']['snippet']['textDisplay']

                # Ambil author name
                comments_data['authorDisplayName'] = item['snippet']['topLevelComment']['snippet']['authorDisplayName']

                # Ambil like
                comments_data['likeCount'] = item['snippet']['topLevelComment']['snippet']['likeCount']

                # Ambil datetime
                comments_data['publishedAt'] = item['snippet']['topLevelComment']['snippet']['publishedAt']

                result['comments'].append(comments_data)

                ### CEK APAKAH ADA REPLY?
                replycount = item['snippet']['totalReplyCount']

                if replycount>0:
                    for reply in item['replies']['comments']:
                        # Ambil reply
                        replies_data['textDisplay'] = reply['snippet']['textDisplay']

                        # Ambil author
                        replies_data['authorDisplayName'] = reply['snippet']['authorDisplayName']

                        # Ambil like
                        replies_data['likeCount'] = reply['snippet']['likeCount']

                        # Ambil datetime
                        replies_data['publishedAt'] = reply['snippet']['publishedAt']

                        result['comments'].append(replies_data)

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
        video_caption = video_info['description']
        video_published_date = video_info['publishedAt']

        result['like_count'].append(video_statistic['likeCount'])
        result['title'].append(video_title)
        result['caption'].append(video_caption)
        result['comments'].append(video_published_date)

    except Exception as e:
        print(f"An error occurred: {e}")

def youtube_crawling(youtube_id):
    # API KEY from Google
    api_key = 'AIzaSyCwUou2DhU3oQGKaIsi6bdS3YG-2FMO908'

    result = {
        "video_id": "",
        "title": "",
        "caption": "",
        "like_count": "",
        "published_date": "",
        "comments": []
    }
    result['video_id'].append(youtube_id)

    video_comments(youtube_id, api_key, result)

    video_data(youtube_id, api_key, result)

    return result

