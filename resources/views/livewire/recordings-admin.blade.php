<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                                                    wire:click="getUpdate({{ $recording->id }})"
                                                    class="card-category">Редактировать</a>
                                                <a style="cursor: pointer"
                                                    wire:click="deleteStore({{ $recording->id }})"
                                                    class="card-category">Удалить</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr style="display: {{ $addHidden ? 'none' : 'table-row' }}"
                                        wire:key="{{ 'storeadd' }}">
                                        <td>
                                            {{ $recordings->count() }}
                                        </td>
                                        <td>
                                            <input wire:model.defer="name" value="{{ $name }}" type="text">
                                        </td>
                                        <td>
                                            <textarea wire:model.defer="description"
                                                style="resize: vertical; width: 100%;">

                                            </textarea>
                                        </td>
                                        {{-- <td>
                                            <select name="" id="" wire:model.defer="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td> --}}
                                        <td class="text-primary">
                                            <input type="number" wire:model.defer="price">
                                        </td>
                                        <td class="text-primary">
                                            <a style="cursor: pointer" wire:click="{{ $method_store }}"
                                                class="card-category">
                                                {{ $text_button }}
                                            </a>
                                            <a style="cursor: pointer" wire:click="addHidden()" class="card-category">
                                                Закрыть
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
