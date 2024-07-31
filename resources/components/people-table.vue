<script setup lang="ts">
const props = defineProps<{
  people: UnwrappedPaginator<App.Data.PersonData>
}>()

const page = computed(() => props.people.current_page)

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
  <v-data-table
    :page.sync="page"
    :headers="headers"
    :items="people.data"
    :items-per-page="people.per_page"
    class="rounded"
  >
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
</template>
