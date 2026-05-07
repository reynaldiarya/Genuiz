# Genuiz

An intelligent, NLP-powered platform for automatically generating interactive multiple-choice questions from PDF documents.

<p align="center">
  <img src="https://img.shields.io/badge/version-1.0.1-blue.svg" />
  <img src="https://img.shields.io/badge/Python-3.8+-3776AB.svg" />
  <img src="https://img.shields.io/badge/PHP-8.0+-777BB4.svg" />
  <a href="LICENSE">
    <img alt="License" src="https://img.shields.io/badge/license-MIT-yellow.svg" target="_blank" />
  </a>
</p>

## Description

Genuiz is a comprehensive assessment generation tool designed to transform static educational documents into dynamic multiple-choice quizzes. Built with a robust Python backend and a lightweight PHP frontend, the application utilizes advanced Natural Language Processing (NLP) algorithms to understand document context, extract critical information, and construct highly relevant questions alongside plausible alternative answers (distractors). Genuiz significantly reduces the manual effort required by educators, corporate trainers, and content creators to evaluate learning outcomes.

## Features

- **Automated Assessment Creation** - Instantly process PDF documents to generate contextually accurate multiple-choice questions.
- **Advanced NLP Integration** - Leverages state-of-the-art models including PyTorch, Transformers, and Sense2Vec for deep textual analysis and keyword extraction.
- **Intelligent Distractor Generation** - Automatically formulates challenging and logically sound incorrect options to ensure high-quality assessments.
- **Seamless Document Processing** - Features built-in PDF parsing and text extraction capabilities optimized for immediate content processing.
- **Interactive User Interface** - Provides a clean, Bootstrap-powered web application for uploading materials, configuring parameters, and taking quizzes directly in the browser.
- **Modular API Architecture** - Connects the user-facing PHP application with the heavy-lifting Python engine via a streamlined RESTful API layer.

## Tech Stack

- **Backend Framework**: Python 3.x, Flask
- **NLP & Machine Learning**: PyTorch, Transformers, Sense2Vec, Scikit-learn, NLTK, Spacy
- **Frontend**: PHP 8.x, HTML5, CSS3
- **Styling**: Bootstrap 5.3
- **Document Processing**: PyPDF2

## Installation

### Prerequisites

- Python 3.8 or higher
- PHP 8.0 or higher
- A local web server environment (e.g., Apache, Nginx, XAMPP, MAMP)

### Steps

1. Clone the repository into your web server's document root directory:

```bash
git clone https://github.com/reynaldiarya/Genuiz.git
cd Genuiz
```

2. Install the required Python dependencies:

```bash
pip install -e .
pip install Flask PyPDF2
```

3. Download the Sense2Vec word vectors model (required for NLP processing), extract the archive, and place it within the project root directory.

4. Create the target directory for PDF uploads and ensure it has the correct write permissions:

```bash
mkdir pdf
chmod 777 pdf
```

5. Start the Python Flask backend service:

```bash
python app.py
```

6. Ensure your local web server is running, then access the frontend application via your browser at `http://localhost/Genuiz` (adjust the URL based on your specific local environment configuration).

## Configuration

The application operates using a dual-server architecture. Ensure the following configurations are properly aligned:

- **Backend Port**: The Python Flask API runs on port `5000` by default.
- **API Endpoint**: The PHP frontend communicates with the backend via a hardcoded endpoint in `hasil.php`. If your backend is hosted on a different server or port, update the cURL configuration accordingly:

```php
CURLOPT_URL => 'http://localhost:5000/generate_mcq',
```

## Usage

### Web Interface Workflow

1. Open the Genuiz application in your web browser.
2. Click **Pilih File (PDF)** to upload a document containing the source material.
3. Define the desired number of questions in the **Maksimal Pertanyaan** field.
4. Submit the form to initiate text extraction and NLP processing.
5. Upon completion, the system will redirect to the results page where you can interactively answer the generated multiple-choice questions.

### API Integration

The Python backend exposes a dedicated endpoint for question generation, allowing it to be consumed by other applications or services.

**POST /generate_mcq**

Request Payload:
```json
{
  "input_text": "your_uploaded_document_name.pdf",
  "max_questions": 5
}
```

## Project Structure

```text
/
├── app.py                # Core Flask API and request handling logic
├── index.php             # Primary web interface and file upload handler
├── hasil.php             # Assessment presentation and API consumption layer
├── setup.py              # Python package and dependency definitions
├── tes3.py               # Sandbox script for standalone PDF extraction testing
├── Questgen/             # Core NLP module handling keyword and MCQ generation
└── pdf/                  # Secure storage directory for uploaded PDF documents
```

## Scripts / Commands

| Command | Description |
|---------|-------------|
| `python app.py` | Initializes and runs the Flask backend API server |
| `python tes3.py` | Executes the local testing script for debugging PDF extraction |
| `pip install -e .` | Installs the internal Questgen module and all defined dependencies |

## Contributing

Contributions are welcome. To contribute:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/your-feature-name`)
3. Commit your changes (`git commit -m 'Add specific feature'`)
4. Push to the branch (`git push origin feature/your-feature-name`)
5. Open a Pull Request

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for detailed terms and conditions.

## Author

Reynaldi Arya