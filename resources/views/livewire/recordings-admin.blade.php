<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-warning">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Список товаров</h4>
                        <a style="cursor: pointer" wire:click="addHidden('addStore()','Добавить')"
                            class="card-category">Добавить</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Клиент
                                    </th>
                                    <th>
                                        Заказ
                                    </th>
                                    <th>
                                        Дата записи
                                    </th>
                                    <th>
                                        Комментарий клиента/администратора
                                    </th>
                                    <th>
                                        Статус
                                    </th>
                                    <th>
                                        Действия
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($recordings as $key => $recording)
                                        <tr wire:key="{{ 'recording' . $recording->id }}">
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $recording->user->email }}
                                            </td>
                                            <td class="text-primary">
                                                {{ $recording->store->name }}
                                                {{ $recording->store->price }}&#8381
                                                ({{ $recording->store->category->name }})
                                            </td>
                                            <td>
                                                {{ date('d.m.Y', strtotime($recording->date_recording)) }}
                                            </td>
                                            <td>
                                                {{ $recording->comment_customer ?? 'Отсуствует' }} /
                                                {{ $recording->comment_admin ?? 'Отсуствует' }}
                                            </td>
                                            <td>
                                                @switch($recording->status)
                                                    @case(-1)
                                                    Отклонено
                                                    @break
                                                    @case(0)
                                                    В ожидании
                                                    @break
                                                    @case(1)
                                                    Выполняется
                                                    @break
                                                    @case(2)
                                                    Выполнено
                                                    @break
                                                @endswitch
                                            </td>
                                            <td class="text-primary">
                                                <a style="cursor: pointer"
                                                    wire:click="nextStep({{ $recording->id }})"
                                                    class="card-category">Вперёд</a>
                                                <a style="cursor: pointer"
                                                    wire:click="backStep({{ $recording->id }})"
                                                    class="card-category">Назад</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
