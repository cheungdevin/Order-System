from flask import Flask

app = Flask(__name__)

@app.route("/api/discountCalculator/<org>")
def process(org=None):
    # processing of request data goes here ...
    org = eval(org)
    if org>10000:
        ntp = org*(1-0.12)
    elif org > 5000:
        ntp=org*(1-0.08)
    elif org > 3000:
        ntp = org*(1-0.03)
    else:
        ntp = org
    response_data = {"newTotalPrice": ntp}
    return response_data

if __name__ == "__main__":
    app.run(debug=True,
            host='127.0.0.1',
            port=8080)
