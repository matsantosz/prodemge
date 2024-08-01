<script setup lang="ts">
const dialog = ref(false)

const form = useForm({
  method: 'POST',
  url: route('people.store'),
  fields: {
    name: '',
    socialName: '',
    cpf: '',
    fatherName: '',
    motherName: '',
    phoneNumber: '',
    email: '',
  },
  hooks: {
    success: () => {
      dialog.value = false
    },
  },
  preserveScroll: true,
})
</script>

<template>
  <v-dialog v-model="dialog" max-width="500">
    <template v-slot:activator="{ props: activatorProps }">
      <v-btn
        v-bind="activatorProps"
        text="Cadastrar Pessoa"
        prepend-icon="mdi-plus"
        color="blue"
        size="large"
        class="d-flex mb-4 ml-auto"
      ></v-btn>
    </template>

    <v-card prepend-icon="mdi-account" title="Cadastrar Pessoa" class="pa-4">
      <form @submit.prevent="form.submit">
        <v-card-text>
          <v-row dense>
            <v-col cols="12" sm="7">
              <v-text-field
                label="Nome *"
                v-model="form.fields.name"
                :error="!!form.errors.name"
                :error-messages="form.errors.name"
                @update:modelValue="form.clearError('name')"
                required
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="5">
              <v-text-field
                label="Nome Social"
                v-model="form.fields.socialName"
                :error="!!form.errors.socialName"
                :error-messages="form.errors.socialName"
                @update:modelValue="form.clearError('socialName')"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="5">
              <v-text-field
                label="CPF *"
                v-model="form.fields.cpf"
                :error="!!form.errors.cpf"
                :error-messages="form.errors.cpf"
                v-mask="['###.###.###-##']"
                @update:modelValue="form.clearError('cpf')"
                required
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="7">
              <v-text-field
                label="Telefone *"
                v-model="form.fields.phoneNumber"
                :error="!!form.errors.phoneNumber"
                :error-messages="form.errors.phoneNumber"
                v-mask="['(##) #####-####']"
                @update:modelValue="form.clearError('phoneNumber')"
                required
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12">
              <v-text-field
                type="email"
                label="E-mail *"
                v-model="form.fields.email"
                :error="!!form.errors.email"
                :error-messages="form.errors.email"
                @update:modelValue="form.clearError('email')"
                required
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12">
              <v-text-field
                label="Nome do Pai *"
                v-model="form.fields.fatherName"
                :error="!!form.errors.fatherName"
                :error-messages="form.errors.fatherName"
                @update:modelValue="form.clearError('fatherName')"
                required
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12">
              <v-text-field
                label="Nome da Mãe *"
                v-model="form.fields.motherName"
                :error="!!form.errors.motherName"
                :error-messages="form.errors.motherName"
                @update:modelValue="form.clearError('motherName')"
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
