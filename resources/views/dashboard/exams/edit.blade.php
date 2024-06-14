@extends('layouts.dashboard.app')
@section('header__title', __('models.exams'))

@section('main')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <div class="d-flex p-3 px-4 align-items-center justify-content-between w-100">
                    <h5 class="card-header p-0">{{ __('models.edit_exam') }}</h5>
                    <a href="{{ route('exams.index') }}" style="width: fit-content">
                        <button type="button" class="btn btn-dark d-flex align-items-center gap-2"> <i
                                class="fa-solid fa-backward"></i>
                        </button>
                    </a>
                </div>
                <div class="card-body">

                        <form id="editExamForm" class="forms-sample" method="POST" action="{{ route('exams.update', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="level_id">{{__("models.level")}}</label>
                                <select class="form-control" id="level_id" name="level_id">
                                    @foreach ($levels as $level)
                                    <option value="{{$level->id}}" {{ $level->id == $data->level_id ? 'selected' : '' }}>{{$level->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="time">{{__("models.total_time")}}({{__("models.minutes")}})</label>
                                <input type="number" class="form-control" id="time" name="time" value="{{ $data->time }}" required>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-6">
                                    <label for="start_time">{{__("models.start_time")}}</label>
                                    <input type="time" class="form-control" id="start_time" value="{{old('start_time',$data->start_time )}}" name="start_time" required>
                                </div>
                                <div class="form-group mb-3 col-6">
                                    <label for="end_time">{{__("models.end_time")}}</label>
                                    <input type="time" class="form-control" id="end_time" value="{{old('end_time',$data->end_time )}}" name="end_time" required>
                                </div>
                            </div>
                            <div id="questions" class="mb-3">
                                <h3>{{__("models.questions")}}</h3>
                                @foreach($data->questions as $key => $question)
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="question_data_{{$key + 1}}">Question {{$key + 1}} Data</label>
                                        <input type="text" class="form-control question-data" id="question_data_{{$key + 1}}" name="questions[{{$key}}][data]" value="{{ $question->data }}" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="question_operation_{{$key + 1}}">Operation</label>
                                        <select class="form-control  question-operation" id="question_operation_{{$key + 1}}" name="questions[{{$key}}][operation]" required>
                                            <option value="+" {{ $question->operation == '+' ? 'selected' : '' }}>+</option>
                                            <option value="-" {{ $question->operation == '-' ? 'selected' : '' }}>-</option>
                                            <option value="*" {{ $question->operation == '*' ? 'selected' : '' }}>*</option>
                                            <option value="/" {{ $question->operation == '/' ? 'selected' : '' }}>/</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="question_time_{{$key + 1}}">Time (seconds)</label>
                                        <input type="text" class="form-control" id="question_time_{{$key + 1}}" name="questions[{{$key}}][time]" value="{{ $question->time }}" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="question_correct_answer_{{$key + 1}}">Correct Answer</label>
                                        <input type="text" class="form-control question-correct-answer" id="question_correct_answer_{{$key + 1}}" name="questions[{{$key}}][correct_answer]" value="{{ $question->correct_answer }}" readonly required>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-secondary" id="addQuestionBtn">Add Question</button>
                            <button type="button" class="btn btn-danger" id="deleteQuestionBtn">Delete Last Question</button>

                            <button type="submit" class="btn btn-primary">Update Exam</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-dashboard')
<script>
    $(document).ready(function () {
        let questionCount = {{ $data->questions->count() }};

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

    });
</script>
@endsection
