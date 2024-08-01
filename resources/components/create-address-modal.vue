<script setup lang="ts">
const props = defineProps<{
  personId: string | null
}>()

const dialog = ref(false)

const form = useForm({
  method: 'POST',
  url: route('address.store'),
  fields: {
    person_id: props.personId,
    type: '',
    zip_code: '',
    street: '',
    number: '',
    additional: '',
    neighborhood: '',
    state: '',
    city: '',
  },
  hooks: {
    success: () => {
      dialog.value = false
    },
  },
  preserveState: true,
  preserveScroll: true,
})
</script>

<template>
  <v-dialog v-model="dialog" max-width="500">
    <template v-slot:activator="{ props: activatorProps }">
      <v-btn
        v-bind="activatorProps"
        text="Cadastrar Endereço"
        prepend-icon="mdi-plus"
        class="mb-4"
        color="black"
      ></v-btn>
    </template>

    <v-card prepend-icon="mdi-account" title="Cadastrar Endereço" class="pa-4">
      <form @submit.prevent="form.submit">
        <v-card-text>
          <v-row dense>
            <v-col cols="12" sm="7">
              <v-select
                label="Tipo de Endereço"
                v-model="form.fields.type"
                :items="[
                  {
                    title: 'Residencial',
                    value: 'home',
                  },
                  {
                    title: 'Comercial',
                    value: 'business',
                  },
                ]"
                :error="!!form.errors.type"
                :error-messages="form.errors.type"
                required
              ></v-select>
            </v-col>

            <v-col cols="12" sm="5">
              <v-text-field
                label="CEP"
                v-model="form.fields.zip_code"
                :error="!!form.errors.zip_code"
                :error-messages="form.errors.zip_code"
                @update:modelValue="form.clearError('zip_code')"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="9">
              <v-text-field
                label="Logradouro"
                v-model="form.fields.street"
                :error="!!form.errors.street"
                :error-messages="form.errors.street"
                disabled
                required
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="3">
              <v-text-field
                label="Número"
                type="number"
                v-model="form.fields.number"
                :error="!!form.errors.number"
                :error-messages="form.errors.number"
                @update:modelValue="form.clearError('number')"
                required
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12">
              <v-text-field
                label="Complemento"
                v-model="form.fields.additional"
                :error="!!form.errors.additional"
                :error-messages="form.errors.additional"
                @update:modelValue="form.clearError('additional')"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12">
              <v-text-field
                label="Bairro"
                v-model="form.fields.neighborhood"
                :error="!!form.errors.neighborhood"
                :error-messages="form.errors.neighborhood"
                disabled
                required
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12">
              <v-text-field
                label="Estado"
                v-model="form.fields.state"
                :error="!!form.errors.state"
                :error-messages="form.errors.state"
                disabled
                required
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12">
              <v-text-field
                label="Cidade"
                v-model="form.fields.city"
                :error="!!form.errors.city"
                :error-messages="form.errors.city"
                disabled
                required
              ></v-text-field>
            </v-col>
          </v-row>

          <small class="text-caption text-medium-emphasis">
            * indica campos obrigatórios.
          </small>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn text="Fechar" variant="plain" @click="dialog = false"></v-btn>

          <v-btn
            type="submit"
            color="primary"
            text="Cadastrar"
            variant="tonal"
            :disabled="form.processing"
            :loading="form.processing"
          ></v-btn>
        </v-card-actions>
      </form>
    </v-card>
  </v-dialog>
</template>
