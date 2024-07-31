<script setup lang="ts">
const isDark = useDark()
const toggleDark = useToggle(isDark)
</script>

<template>
  <v-app :theme="isDark ? 'dark' : 'light'">
    <v-app-bar title="PRODEMGE" class="px-5">
      <v-btn
        text="Alternar Tema"
        :prepend-icon="isDark ? 'mdi-weather-night' : 'mdi-weather-sunny'"
        @click="toggleDark()"
      ></v-btn>
    </v-app-bar>

    <v-main class="px-5">
      <v-container :fluid="true">
        <slot />
      </v-container>
    </v-main>
  </v-app>
</template>
