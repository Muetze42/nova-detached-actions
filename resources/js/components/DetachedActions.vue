<template>
  <div class="hidden md:flex justify-end items-center gap-2">
    <div v-for="action in actions" :key="action.uriKey">
      <button
        type="button"
        :class="action.buttonClasses"
        :style="action.buttonStyles"
        @click="handleSelectionClick(action.uriKey)"
      >
        <span style="margin-bottom: 0.125rem">
          <DetachedActionIcon :icons="action.icons" />
        </span>
        <span class="block">
          {{ action.name }}
        </span>
      </button>
    </div>
  </div>

  <!-- Confirm Action Modal -->
  <component
    class="text-left"
    v-if="actionModalVisible"
    :show="actionModalVisible"
    :is="selectedAction?.component"
    :working="working"
    :selected-resources="selectedResources"
    :resource-name="resourceName"
    :action="selectedAction"
    :errors="errors"
    @confirm="executeAction"
    @close="closeConfirmationModal"
  />

  <component
    v-if="responseModalVisible"
    :show="responseModalVisible"
    :is="actionResponseData?.modal"
    @confirm="closeResponseModal"
    @close="closeResponseModal"
    :data="actionResponseData"
  />
</template>
<script setup>
/**
 * @property action.buttonClasses
 * @property action.buttonStyles
 */
import DetachedActionIcon from '@norman-huth/helpers-collection-js/components/nova/Icon.vue'
import { useActions } from '@/composables/useActions'
import { useStore } from 'vuex'

const store = useStore()

const emitter = defineEmits(['actionExecuted'])

const props = defineProps({
  width: { type: String, default: 'auto' },
  pivotName: { type: String, default: null },

  resourceName: {},
  viaResource: {},
  viaResourceId: {},
  viaRelationship: {},
  relationshipType: {},
  pivotActions: {
    type: Object,
    default: () => ({ name: 'Pivot', actions: [] })
  },
  actions: { type: Array, default: [] },
  selectedResources: { type: [Array, String], default: () => [] },
  endpoint: { type: String, default: null },
  triggerDuskAttribute: { type: String, default: null },
})

const {
  errors,
  actionModalVisible,
  responseModalVisible,
  openConfirmationModal,
  closeConfirmationModal,
  closeResponseModal,
  handleActionClick,
  selectedAction,
  setSelectedActionKey,
  determineActionStrategy,
  working,
  executeAction,
  availableActions,
  availablePivotActions,
  actionResponseData,
} = useActions(props, emitter, store)

const handleSelectionClick = event => {
  setSelectedActionKey(event)
  determineActionStrategy()
}

</script>
