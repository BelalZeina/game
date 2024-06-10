@extends('layouts.dashboard.app')
@section("header__title", __("models.exams"))
@section('main')
    <div class="content-wrapper">
        <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <div class="d-flex p-3 px-4 align-items-center justify-content-between w-100">
                    <h5 class="card-header p-0">{{ __('models.add_exam') }}</h5>
                    <a href="{{ route('exams.index') }}" style="width: fit-content">
                        <button type="button" class="btn btn-dark d-flex align-items-center gap-2"> <i
                                class="fa-solid fa-backward"></i>
                        </button>
                    </a>
                </div>
                <div class="card-body">

                        <form id="createExamForm" class="forms-sample" method="POST" action="{{ route('exams.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="level_id">{{__("models.level")}}</label>
                                <select class="form-control" id="level_id" name="level_id">
                                    @foreach ($levels as $level)
                                    <option value="{{$level->id}}" {{ $level->id==old("level_id") ? 'selected' : '' }}>{{$level->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="time">{{__("models.total_time")}}({{__("models.minutes")}})</label>
                                <input type="number" class="form-control" id="time" name="time" required>
                            </div>
                            <div id="questions" class="mb-3">
                                <h3>{{__("models.questions")}}</h3>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="question_data_1">Question 1 Data</label>
                                        <input type="text" class="form-control question-data" id="question_data_1" name="questions[0][data]" placeholder="e.g. 1,2,3,4"  required>
                                    </div>
                                    <div class="col-3">
                                        <label for="question_operation_1">Operation</label>
                                        <select class="form-control  question-operation" id="question_operation_1" name="questions[0][operation]" required>
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                            <option value="*">*</option>
                                            <option value="/">/</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="question_time_1">Time (seconds)</label>
                                        <input type="text" class="form-control question-time" id="question_time_1" name="questions[0][time]" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="question_correct_answer_1">Correct Answer</label>
                                        <input type="text" class="form-control question-correct-answer" id="question_correct_answer_1" name="questions[0][correct_answer]" @readonly(true) required>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary" id="addQuestionBtn">Add Question</button>
                            <button type="button" class="btn btn-danger" id="deleteQuestionBtn">Delete Last Question</button>

                            <button type="submit" class="btn btn-primary">Create Exam</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts-dashboard')
<script>
    $(document).ready(function () {
        let questionCount = 1;

        // Function to calculate the correct answer based on data and operation
        function calculateCorrectAnswer(data, operation) {
            const numbers = data.split(',').map(Number);
            let result = 0;
            switch (operation) {
                case '+':
                    result = numbers.reduce((acc, curr) => acc + curr, 0);
                    break;
                case '-':
                    result = numbers.reduce((acc, curr) => acc - curr);
                    break;
                case '*':
                    result = numbers.reduce((acc, curr) => acc * curr, 1);
                    break;
                case '/':
                    result = numbers.reduce((acc, curr) => acc / curr);
                    break;
                default:
                    break;
            }
            return result;
        }

        $('#addQuestionBtn').click(function () {
            questionCount++;
            const questionHTML = `
                <div class="form-group row">
                    <div class="col-3">
                        <label for="question_data_${questionCount}">Question ${questionCount} Data</label>
                        <input type="text" class="form-control question-data" id="question_data_${questionCount}" name="questions[${questionCount - 1}][data]" placeholder="e.g. 1,2,3,4"  required>
                    </div>
                    <div class="col-3">
                        <label for="question_operation_${questionCount}">Operation</label>
                        <select class="form-control question-operation" id="question_operation_${questionCount}" name="questions[${questionCount - 1}][operation]" required>
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="question_time_${questionCount}">Time (seconds)</label>
                        <input type="text" class="form-control" id="question_time_${questionCount}" name="questions[${questionCount - 1}][time]" required>
                    </div>
                    <div class="col-3">
                        <label for="question_correct_answer_${questionCount}">Correct Answer</label>
                        <input type="text" class="form-control question-correct-answer" id="question_correct_answer_${questionCount}" name="questions[${questionCount - 1}][correct_answer]" readonly required>
                    </div>
                </div>`;
            $('#questions').append(questionHTML);
        });

        // Delete last question
        $('#deleteQuestionBtn').click(function () {
            const questions = $('.form-group.row');
            if (questions.length > 1) {
                questions.last().remove(); // Remove the last question
            }
        });

        // Calculate correct answer when data or operation changes
        $(document).on('change', '.question-data, .question-operation', function () {
            const questionDiv = $(this).closest('.form-group.row');
            const data = questionDiv.find('.question-data').val();
            const operation = questionDiv.find('.question-operation').val();
            const correctAnswerInput = questionDiv.find('.question-correct-answer');
            const correctAnswer = calculateCorrectAnswer(data, operation);
            correctAnswerInput.val(correctAnswer);
        });

        // Form submission logic
        // $('#createExamForm').submit(function (event) {
        //     event.preventDefault();
        //     // Add your AJAX form submission logic here
        //     console.log($(this).serialize());
        //     alert("Exam created successfully!");
        // });
    });
</script>
@endsection



