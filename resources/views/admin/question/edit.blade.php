<x-app-layout>
    <x-slot name="header">{{ $question->question }} sualını dəyişdir</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-end">
                <a  href="{{route('questions.index' ,$question->quiz_id)}}" class="btn btn-secondary"><i class="fas fa-undo"></i> Geri</a>
            </div>
            <form method="POST" action="{{route('questions.update',[$question->quiz_id,$question->id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label for="">Sual</label>
                    <textarea type="text" name="question" class="form-control" id="">{{ $question->question }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="">Şəkil</label>
                    @if ($question->image)
                    <img style="width:300px; height:200px;" src="{{asset($question->image)}}" alt="">
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="">1. Cavab</label>
                            <textarea type="text" name="answer1" class="form-control" id="">{{ $question->answer1 }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="">2. Cavab</label>
                            <textarea type="text" name="answer2" class="form-control" id="">{{ $question->answer2 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="">3. Cavab</label>
                            <textarea type="text" name="answer3" class="form-control" id="">{{ $question->answer3 }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-4">
                            <label for="">4. Cavab</label>
                            <textarea type="text" name="answer4" class="form-control" id="">{{ $question->answer4 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class=" form-group mb-4">
                            <label for="">Doğru Cavab</label>
                            <select name="correct_answer" id="">
                                <option @if ($question->correct_answer==='answer1') selected @endif value="answer1">1. Cavab</option>
                                <option @if ($question->correct_answer==='answer2') selected @endif value="answer2">2. Cavab</option>
                                <option @if ($question->correct_answer==='answer3') selected @endif value="answer3">3. Cavab</option>
                                <option @if ($question->correct_answer==='answer4') selected @endif value="answer4">4. Cavab</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group text-right">
                    <input type="submit" value="Dəyişdir"  class="btn btn-sm btn-success" id="">
                </div>
            </form>
        </div>
    </div>

    
</x-app-layout>
