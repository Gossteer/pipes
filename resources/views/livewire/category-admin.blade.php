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
                                        Действия
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr wire:key="{{ 'store' . $category->id }}">
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $category->name }}
                                            </td>
                                            <td class="text-primary">
                                                <a style="cursor: pointer" wire:click="getUpdate({{ $category->id }})"
                                                    class="card-category">Редактировать</a>
                                                <a style="cursor: pointer"
                                                    wire:click="deleteStore({{ $category->id }})"
                                                    class="card-category">Удалить</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr style="display: {{ $addHidden ? 'none' : 'table-row' }}"
                                        wire:key="{{ 'storeadd' }}">
                                        <td>
                                            {{ $categories->count() }}
                                        </td>
                                        <td>
                                            <input wire:model.defer="name" value="{{ $name }}" type="text">
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
