from flask import Flask, request, jsonify
import PyPDF2
from Questgen import main

app = Flask(__name__)
def extract_text_from_pdf(pdf_path):
    with open(pdf_path, 'rb') as file:
        pdf_reader = PyPDF2.PdfReader(file)
        text = ''
        for page_num in range(len(pdf_reader.pages)):
            page = pdf_reader.pages[page_num]
            text += page.extract_text()
    return text

@app.route('/generate_mcq', methods=['POST'])


def generate_mcq():
    try:
        qg = main.QGen()
        data = request.json
        pdf_path = './pdf/'+data['input_text']
        number_question = data['max_questions']
        pdf_text = extract_text_from_pdf(pdf_path)
        payload = {
            "input_text": pdf_text,
            "max_questions": number_question
        }

        output = qg.predict_mcq(payload)

        return jsonify(output)

    except Exception as e:
        return jsonify({"error": str(e)})

if __name__ == '__main__':
    app.run(debug=False)
