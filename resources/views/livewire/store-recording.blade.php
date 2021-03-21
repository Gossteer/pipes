<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: black" id="ModalLabel">Запись на работу</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="date_recording">Дата записи</label>
                        <input autocomplete="off" wire:model="date_recording" type="text" class="form-control"
                         id="date_recording" x-text="date_recording"  onchange="this.dispatchEvent(new InputEvent('input'))"
                        x-data x-ref="date_recording" x-init="
                        new Pikaday({
                            field: $refs.date_recording,
                            format: 'DD.MM.YYYY',
                            minDate: new Date(),
                            i18n: {
                                months        : ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октярь','Ноябрь','Декабрь'],
                                weekdays      : ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'],
                                weekdaysShort : ['Вс','Пн','Вт','Ср','Чт','Пт','Сб']
                            },
                            disableDayFn: function(theDate) {
                                let date = moment(theDate).format('YYYY-MM-DD');
                                for (let dateDisabled of [
                                    @foreach ($recording_dates as $recording_date)
                                        '{{$recording_date}}',
                                    @endforeach
                                ]) {
                                    if (date == dateDisabled) {
                                        return true;
                                    }
                                  }
                                return false;
                             }
                        })">
                    </div>
                    {{-- <div id="inline" data-date="01/05/2020" class="form-group">
                        <label for="date_recording">Дата записи</label>
                        <input type="text" id="datepicker" name="datepicker" class="form-control" wire:model.defer="date_recording" placeholder="Выберете дату, на которую хотите записаться">
                    </div> --}}
                    <div class="form-group">
                        <label for="comment_customer">Комментарий</label>
                        <textarea class="form-control" wire:model.defer="comment_customer" name="comment_customer"
                            id="comment_customer"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="close()" class="btn btn-secondary"
                    data-dismiss="modal">Закрыть</button>
                <button type="button" wire:click.prevent="recording()"
                    class="btn btn-primary" data-dismiss="modal">Записаться</button>
            </div>
        </div>
    </div>
</div>

@push('style')
    {{-- <link href="{{ asset('material') }}/datepicker/css/datepicker-bs4.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    {{-- <script src="{{ asset('material') }}/datepicker/js/datepicker-full.min.js"></script>
    <script src="{{ asset('material') }}/datepicker/js/locales/ru.js"></script>
    <script>
        const elem = document.querySelector('input[name="datepicker"]');
        const datepicker = new Datepicker(elem, {
            autohide: true,
            language: 'ru',
            disableTouchKeyboard: true,
            minDate: new Date(),
        });
        // $lol = datepicker.beforeShowDay(new Date());
        // $lol.enabled = false;
        elem.addEventListener('changeDate', function (e, details) {

        });
    </script> --}}
@endpush
