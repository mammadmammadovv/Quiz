<x-app-layout>
    <x-slot name="header">Sual əlavə et</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-end">
                <a  href="{{route('quizzes.index')}}" class="btn btn-secondary"><i class="fas fa-undo"></i> Geri</a>
            </div>
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
                    <label for="">Quiz statusu</label>
                    <select name="status" id="" class="form-control">
                        <option @if($quiz->questions_count<4) disabled @endif @if($quiz->status==='publish') selected @endif value="publish">Aktiv</option>
                        <option @if($quiz->status==='passive') selected @endif value="passive">Passiv</option>
                        <option @if($quiz->status==='draft') selected @endif value="draft">Qaralama</option>
                    </select>
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
                    <input type="submit" class="btn btn-sm btn-success" id="" value="Dəyişdir">
                </div>
            </form>

        </div>
    </div>
    
    
    
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