import { createApp } from 'vue';
import PricingCalculator from '@/components/PricingCalculator.vue';
import OrderSteps from '@/components/OrderSteps.vue';

// Mount PricingCalculator ke DOM jika elemen tersedia
document.addEventListener('DOMContentLoaded', () => {
    const calculatorMountPoint = document.getElementById('pricing-calculator-vue');
    if (calculatorMountPoint) {
        const app = createApp(PricingCalculator);
        app.mount(calculatorMountPoint);
    }

    const stepsMountPoint = document.getElementById('order-steps-vue');
    if (stepsMountPoint) {
        const app = createApp(OrderSteps);
        app.mount(stepsMountPoint);
    }
});
