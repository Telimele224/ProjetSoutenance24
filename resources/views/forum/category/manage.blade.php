@extends ('forum.master', ['category' => null, 'thread' => null, 'breadcrumbs_append' => [trans('Gestion')]])

@section ('content')
    <div class="flex flex-row justify-between mb-2">
        <h2 class="text-3xl font-medium my-3">{{ trans('Gestion') }}</h2>

        @can ('createCategories')
            <x-forum.button type="button" data-open-modal="create-category">
                {{ trans('forum::categories.create') }}
            </x-forum.button>

            @include ('forum.category.modals.create')
        @endcan
    </div>

    <div class="v-manage-categories">
        <draggable-category-list :categories="categories"></draggable-category-list>

        <transition name="fade">
            <div v-show="changesApplied" class="bg-green-100 mb-4 text-green-700 mt-3 px-4 py-3" role="alert">
                {{ trans('forum::general.changes_applied') }}
            </div>
        </transition>

        <div class="flex justify-end py-3">
            <button type="button" class="bg-blue-500 text-white rounded py-2 px-8 hover:cursor-pointer disabled:opacity-50" :disabled="isSavingDisabled" @click="onSave">
                {{ trans('Enregistrer') }}
            </button>
        </div>
    </div>

    <script type="text/x-template" id="draggable-category-list-template">
        <draggable tag="ul" class="list-group" :list="categories" group="categories" :invertSwap="true" :emptyInsertThreshold="14">
            <li class="bg-white px-3 py-2 rounded-sm border" v-for="category in categories" :data-id="category.id" :key="category.id">
                <a class="float-right bg-red-500 text-white px-3 py-2 text-sm rounded ml-2" :href="`${category.route}#modal=delete-category`">{{ trans('forum::general.delete') }}</a>
                <a class="float-right text-blue-500 underline px-3 py-2 text-sm ml-2" :href="`${category.route}#modal=edit-category`">{{ trans('forum::general.edit') }}</a>
                <strong :style="{ color: category.color }">@{{ category.title }}</strong>
                <div class="text-muted">@{{ category.description }}</div>

                <draggable-category-list :categories="category.children"></draggable-category-list>
            </li>
        </draggable>
    </script>

    <script>
    var draggableCategoryList = {
        name: 'draggable-category-list',
        template: '#draggable-category-list-template',
        props: ['categories']
    };

    new Vue({
        el: '.v-manage-categories',
        name: 'ManageCategories',
        components: {
            draggableCategoryList
        },
        data: {
            categories: @json($categories),
            isSavingDisabled: true,
            changesApplied: false
        },
        watch: {
            categories: {
                handler: function (categories) {
                    this.isSavingDisabled = false;
                },
                deep: true
            }
        },
        methods: {
            onSave ()
            {
                this.isSavingDisabled = true;
                this.changesApplied = false;

                var payload = { categories: this.categories };
                axios.post('{{ route('forum.bulk.category.manage') }}', payload)
                    .then(response => {
                        this.changesApplied = true;
                        setTimeout(() => this.changesApplied = false, 3000);
                    })
                    .catch(error => {
                        this.isSavingDisabled = false;
                        console.log(error);
                    });
            }
        }
    });
    </script>
@stop
