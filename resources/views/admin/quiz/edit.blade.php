<x-app-layout>
    <x-slot name="header">Sual əlavə et</x-slot>
    
    
    <form method="POST" action="{{route('quizzes.update',$quiz->id)}}">
        @method('PUT')
        @csrf
        <div class="form-group mb-4">
            <label for="">Quiz başlığı</label>
            <input type="text" name="title" value="{{$quiz->title}}" class="form-control" id="">
        </div>
        <div class="form-group mb-4">
            <label for="">Quiz başlığı</label>
            <textarea type="text" name="description"  class="form-control" id="">{{ $quiz->description }}</textarea>
        </div>
        <div class="form-group mb-4">
            <label for="">Son giriş tarixi əlavə edilsin?</label>
            <input type="checkbox" @if ($quiz->finished_date) checked  @endif  class="" id="isFinished">
        </div>
        <div id="finishedDate" @if (!$quiz->finished_date) style="display: none"  @endif  class="form-group mb-4">
            <label for="">Quiz son giriş tarixi</label>
            <input type="datetime-local" name="finished_date" @if ($quiz->finished_date) value="{{date('Y-m-d\TH:i', strtotime($quiz->finished_date))}}" @endif  class="form-control" id="">
        </div>
        <div class="form-group text-right">
            <input type="submit" class="btn btn-sm btn-success" id="">
        </div>
    </form>
    <x-slot name="js">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                $('#isFinished').change(function(){
                    if($('#isFinished').is(':checked')){
                    $('#finishedDate').show();
                }else{
                    $('#finishedDate').hide();
                }
                });
            });    
        </script>
        
    </x-slot>
</x-app-layout>