<script setup lang="ts">
defineProps<{
  item: App.Data.PersonData
}>()

const tab = ref('info')
</script>

<template>
  <v-card
    :subtitle="item.socialName ? `Nome Social: ${item.socialName}` : undefined"
    class="pa-8"
  >
    <template v-slot:title>
      <span class="font-weight-black text-h5">{{ item.name }}</span>
    </template>

    <v-tabs v-model="tab" class="mb-5">
      <v-tab value="info">Dados</v-tab>
      <v-tab value="address">Endereço</v-tab>
    </v-tabs>

    <v-tabs-window v-model="tab">
      <v-tabs-window-item value="info">
        <v-row no-gutters class="px-4">
          <v-col cols="12" md="6" lg="4">
            <div>
              <div class="text-body-1 text-disabled">CPF</div>
              <div class="d-flex align-center">
                <v-icon icon="mdi-text-box"></v-icon>
                <p class="text-body-1">{{ item.cpf }}</p>
              </div>
            </div>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div>
              <div class="text-body-1 text-disabled">Nome do Pai</div>
              <div class="d-flex align-center">
                <v-icon icon="mdi-face-man"></v-icon>
                <p class="ml-1 text-body-1">{{ item.fatherName }}</p>
              </div>
            </div>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div>
              <div class="text-body-1 text-disabled">Nome da Mãe</div>
              <div class="d-flex align-center">
                <v-icon icon="mdi-face-woman"></v-icon>
                <p class="ml-1 text-body-1">{{ item.motherName }}</p>
              </div>
            </div>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div>
              <div class="text-body-1 text-disabled">E-mail</div>
              <div class="d-flex align-center">
                <v-icon icon="mdi-email"></v-icon>
                <p class="ml-1 text-body-1">{{ item.email }}</p>
              </div>
            </div>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div>
              <div class="text-body-1 text-disabled">Telefone</div>
              <div class="d-flex align-center">
                <v-icon icon="mdi-account-box"></v-icon>
                <p class="ml-1 text-body-1">{{ item.phoneNumber }}</p>
              </div>
            </div>
          </v-col>
        </v-row>
      </v-tabs-window-item>

      <v-tabs-window-item value="address">
        <edit-address-modal :address="item.address" />
        <v-row no-gutters class="px-4">
          <v-col cols="12" md="6" lg="4">
            <div class="text-body-1 text-disabled">Tipo de Endereço</div>
            <p class="text-body-1" v-if="item.address.type">
              {{ item.address.type }}
            </p>
            <p class="text-body-1 text-disabled" v-else>-</p>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div class="text-body-1 text-disabled">CEP</div>
            <p class="text-body-1" v-if="item.address.zip_code">
              {{ item.address.zip_code }}
            </p>
            <p class="text-body-1 text-disabled" v-else>-</p>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div class="text-body-1 text-disabled">Logradouro</div>
            <p class="text-body-1" v-if="item.address.street">
              {{ item.address.street }}
            </p>
            <p class="text-body-1 text-disabled" v-else>-</p>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div class="text-body-1 text-disabled">Número</div>
            <p class="text-body-1" v-if="item.address.number">
              {{ item.address.number }}
            </p>
            <p class="text-body-1 text-disabled" v-else>-</p>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div class="text-body-1 text-disabled">Complemento</div>
            <p class="text-body-1" v-if="item.address.additional">
              {{ item.address.additional }}
            </p>
            <p class="text-body-1 text-disabled" v-else>-</p>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div class="text-body-1 text-disabled">Bairro</div>
            <p class="text-body-1" v-if="item.address.neighborhood">
              {{ item.address.neighborhood }}
            </p>
            <p class="text-body-1 text-disabled" v-else>-</p>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div class="text-body-1 text-disabled">Cidade</div>
            <p class="text-body-1" v-if="item.address.city">
              {{ item.address.city }}
            </p>
            <p class="text-body-1 text-disabled" v-else>-</p>
          </v-col>

          <v-col cols="12" md="6" lg="4">
            <div class="text-body-1 text-disabled">Estado</div>
            <p class="text-body-1" v-if="item.address.state">
              {{ item.address.state }}
            </p>
            <p class="text-body-1 text-disabled" v-else>-</p>
          </v-col>
        </v-row>
      </v-tabs-window-item>
    </v-tabs-window>
  </v-card>
</template>
