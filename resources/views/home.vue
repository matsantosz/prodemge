<script setup lang="ts">
defineProps<{
  people: UnwrappedPaginator<App.Data.PersonData>
}>()
</script>

<template layout>
  <div>
    <people-search />
    <people-table :people="people" />
  </div>
</template>
