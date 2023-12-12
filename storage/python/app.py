from flask import Flask
from instagram_comment import instagram_crawling


app = Flask(__name__)

@app.route("/")
def index():
    return "Hello World!"


if __name__ == "__main__":
    app.run(debug=True)