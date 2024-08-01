<script setup lang="ts">
const search = ref('')

const searchFn = useDebounceFn(() => {
  router.get('/', {
    data: {
      query: search.value && search.value !== '' ? search.value : undefined,
    },
    preserveState: true,
  })
}, 400)

watch(search, searchFn)
</script>

<template>
  <div>
    <h1 class="text-h4 mb-6">
      <v-icon icon="$vuetify"></v-icon>
      Consulta de Pessoas
    </h1>

    <v-row no-gutters>
      <v-col md="6">
        <v-text-field
          prepend-inner-icon="mdi-magnify"
          label="Consulte pessoas por Nome, CPF ou E-mail."
          variant="outlined"
          v-model="search"
          clearable
        />
      </v-col>
    </v-row>
  </div>
</template>
