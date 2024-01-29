import PyPDF2
from Questgen import main
qg = main.QGen()

# Fungsi untuk mengambil teks dari PDF
def extract_text_from_pdf(pdf_path):
    with open(pdf_path, 'rb') as file:
        pdf_reader = PyPDF2.PdfReader(file)
        text = ''
        for page_num in range(len(pdf_reader.pages)):
            page = pdf_reader.pages[page_num]
            text += page.extract_text()
    return text

# Path file PDF yang ingin diolah
pdf_path = './pdf/1706249975_65b34ef77d0a9.pdf'

# Ekstrak teks dari PDF
pdf_text = extract_text_from_pdf(pdf_path)

payload = {
            "input_text": pdf_text,
            "max_questions": 2
        }

output = qg.predict_mcq(payload)
print (output)