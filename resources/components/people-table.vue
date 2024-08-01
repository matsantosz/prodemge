<script setup lang="ts">
const props = defineProps<{
  people: UnwrappedPaginator<App.Data.PersonData>
}>()

const expanded = ref([])
const page = ref(props.people.current_page)

const headers = [
  { title: 'Nome', value: 'name' },
  { title: 'CPF', value: 'cpf' },
  { title: 'E-mail', value: 'email' },
  { title: 'Telefone', value: 'phoneNumber' },
]

const setCurrentPage = (page: number) => {
  router.get('/', {
    data: {
      page: page && page > 1 ? page : undefined,
    },
    replace: true,
  })
}
</script>

<template>
  <div>
    <people-form-modal />

    <v-data-table
      :page.sync="page"
      :headers="headers"
      :items="people.data"
      :items-per-page="people.per_page"
      v-model:expanded="expanded"
      show-expand
      class="rounded"
    >
      <template v-slot:expanded-row="{ columns, item }">
        <td :colspan="columns.length">
          <person-info :item="item" />
        </td>
      </template>

      <template v-slot:bottom>
        <div class="pt-2">
          <v-pagination
            v-model="page"
            :length="people.last_page"
            :show-first-last-page="true"
            @update:modelValue="setCurrentPage"
          ></v-pagination>
        </div>
      </template>
    </v-data-table>
  </div>
</template>
