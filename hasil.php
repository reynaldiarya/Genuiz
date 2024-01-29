<?php
$text = $_GET["text"] ?? null;
$max_questions = $_GET["questions"] ?? null;

if ($text != null) {
    $postData = array(
        'input_text' => "$text",
        'max_questions' => "$max_questions",
    );

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:5000/generate_mcq',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
        ),
    ));


    $response = curl_exec($curl);
    curl_close($curl);
    $questions = json_decode($response, true);
}
// $jsonData = '{
//     "statement": "Reynaldi is a god-level pro programmer from Indonesia",
//     "questions": [
//       {
//         "question_statement": "Where is Reynaldi from?",
//         "question_type": "MCQ",
//         "answer": "indonesia",
//         "id": 1,
//         "options": ["Malaysia", "Thailand", "Philippines"],
//         "options_algorithm": "sense2vec",
//         "extra_options": [
//           "South East Asia",
//           "Brunei",
//           "Singapore",
//           "Myanmar",
//           "India"
//         ],
//         "context": "Reynaldi is a god-level pro programmer from Indonesia"
//       },
//       {
//         "question_statement": "Who is Reynaldi?",
//         "question_type": "MCQ",
//         "answer": "programmer",
//         "id": 1,
//         "options": ["pro programmer", "god-level"],
//         "options_algorithm": "sense2vec",
//         "extra_options": [
//           "South East Asia",
//           "Brunei",
//           "Singapore",
//           "Myanmar",
//           "India"
//         ],
//         "context": "Reynaldi is a god-level pro programmer from Indonesia"
//       }
//     ],
//     "time_taken": 67.94712662696838
//   }';

// // Decode JSON menjadi array PHP
// $questions = json_decode($jsonData, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Genuiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-dark text-white">
    <div class="text-center mt-5 mb-0">
        <h1>Genuiz</h1>
    </div>
    <div class="container">

        <div class="row">
            <?php
            $i = 0;
            if ($questions != null) {
                foreach ($questions['questions'] as $key => $question) {
                    $i++;
                    $question_statement = $question['question_statement'];
                    $option = $question['options'];
                    $answer = ucfirst($question['answer']);
                    $option[] = $answer;
                    $radioName = "flexRadioDefault" . $i;
                    $quizFrom = "quizForm" . $i;
                    shuffle($option);
                    echo '
                            <div class="col-lg-6 my-2">
                                <div class="card p-2 text-left h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $i . '. ' . $question_statement . '</h5>
                                        <div id="' . $quizFrom . '">
                    ';
                    $j = 0;
                    // Nested loop
                    foreach ($option as $optionkey => $optionanswer) {
                        // Use $nestedQuestion in the nested loop
                        $radiooption = $optionanswer;
                        $j++;
                        $radioId = "flexRadioDefault" . $j;
                        // echo $radioId;
                        echo '
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="' . $radioName . '" id="' . $radioId . '" value="' . $radiooption . '">
                                <label class="form-check-label">
                                    ' . $radiooption . '
                                </label>
                            </div>
                        ';
                    }
                    echo '</div>';



                    echo <<<HTML
                                <p class="card-text mt-2" style="display: none">Answer: $answer</p>
                            </div>
                        </div>
                    </div>
                    HTML;

                    echo '
                    <script>
                    var quizFormElement = document.getElementById("' . $quizFrom . '");
                    var radioInputs = quizFormElement.querySelectorAll(\'input[name="' . $radioName . '"]\');

                    radioInputs.forEach(function(radioInput) {
                        radioInput.addEventListener("change", function() {
                            var selectedOption = this.value;
                            var correctAnswer = "' . $answer . '";
                            if (selectedOption === correctAnswer) {
                                alert("Jawaban Anda benar!");
                            } else {
                                alert("Jawaban Anda salah.");
                            }
                        });
                    });
                    </script>
                ';
                }
            }
            ?>
        </div>
    </div>
    <footer class="py-3">
        <p class="border-top pt-4 text-center mt-5 mb-2">&copy; 2024 D4 Teknik Informatika Universitas Airlangga</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>