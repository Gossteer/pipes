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
                                        Название
                                    </th>
                                    <th>
                                        Описание
                                    </th>
                                    <th>
                                        Категория
                                    </th>
                                    <th>
                                        Цена
                                    </th>
                                    <th>
                                        Действия
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($stores as $key => $store)
                                        <tr wire:key="{{ 'store' . $store->id }}">
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $store->name }}
                                            </td>
                                            <td>
                                                {{ $store->description }}
                                            </td>
                                            <td>
                                                {{ $store->category->name }}
                                            </td>
                                            <td class="text-primary">
                                                {{ $store->price }}
                                            </td>
                                            <td class="text-primary">
                                                <a style="cursor: pointer" wire:click="getUpdate({{ $store->id }})"
                                                    class="card-category">Редактировать</a>
                                                <a style="cursor: pointer" wire:click="deleteStore({{ $store->id }})"
                                                    class="card-category">Удалить</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr style="display: {{ $addHidden ? 'none' : 'table-row' }}"
                                        wire:key="{{ 'storeadd' }}">
                                        <td>
                                            {{ $stores->count() }}
                                        </td>
                                        <td>
                                            <input wire:model.defer="name" value="{{ $name }}" type="text">
                                        </td>
                                        <td>
                                            <textarea wire:model.defer="description"
                                                style="resize: vertical; width: 100%;">

                                            </textarea>
                                        </td>
                                        <td>
                                            <select name="" id="" wire:model.defer="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
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
