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
  <div class="mx-auto w-50">
    <div class="text-h5 mb-4">Consulta de Pessoas</div>

    <v-text-field
      prepend-inner-icon="mdi-magnify"
      label="Consulte pessoas por Nome, CPF ou E-mail."
      variant="outlined"
      v-model="search"
      clearable
    />
  </div>
</template>
