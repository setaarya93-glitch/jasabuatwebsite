<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { computed } from 'vue';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Card, CardContent, CardHeader, CardTitle, CardDescription } from '@/components/ui/card';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { MoreHorizontal, Plus, Calculator, Pencil, Trash2, CheckCircle, XCircle, LayoutGrid, List } from 'lucide-vue-next';
import { index, create, edit, destroy } from '@/routes/dashboard/calculator-features';

type Feature = {
    id: number;
    name: string;
    slug: string;
    description: string | null;
    price: number;
    category: 'feature' | 'service';
    is_recommended: boolean;
    sort_order: number;
    is_active: boolean;
};

const props = defineProps<{
    features: Feature[];
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Kalkulator',
                href: index(),
            },
        ],
    },
});

const featureItems = computed(() => props.features);

const formatPrice = (price: number) => {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
    }).format(price);
};

const deleteFeature = (id: number) => {
    if (confirm('Apakah Anda yakin ingin menghapus fitur ini?')) {
        router.delete(destroy({ 'calculator_feature': id }), {
            preserveScroll: true,
        });
    }
};
</script>

<template>
    <Head title="Kelola Kalkulator" />

    <div class="flex flex-col space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight">Fitur Kalkulator</h1>
                <p class="text-muted-foreground">
                    Kelola fitur dan layanan yang muncul di kalkulator landing page.
                </p>
            </div>
            <Button as-child>
                <Link :href="create()">
                    <Plus class="mr-2 h-4 w-4" />
                    Tambah Fitur
                </Link>
            </Button>
        </div>

        <!-- Stats Cards -->
        <div class="grid gap-4 md:grid-cols-4">
            <Card>
                <CardHeader class="pb-2">
                    <CardDescription>Total Fitur</CardDescription>
                    <CardTitle class="text-3xl">{{ featureItems.length }}</CardTitle>
                </CardHeader>
            </Card>
            <Card>
                <CardHeader class="pb-2">
                    <CardDescription>Fitur Website</CardDescription>
                    <CardTitle class="text-3xl">{{ featureItems.filter(f => f.category === 'feature').length }}</CardTitle>
                </CardHeader>
            </Card>
            <Card>
                <CardHeader class="pb-2">
                    <CardDescription>Layanan Dukungan</CardDescription>
                    <CardTitle class="text-3xl">{{ featureItems.filter(f => f.category === 'service').length }}</CardTitle>
                </CardHeader>
            </Card>
            <Card>
                <CardHeader class="pb-2">
                    <CardDescription>Fitur Aktif</CardDescription>
                    <CardTitle class="text-3xl">{{ featureItems.filter(f => f.is_active).length }}</CardTitle>
                </CardHeader>
            </Card>
        </div>

        <!-- Features List -->
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            <Card v-for="feature in featureItems" :key="feature.id" :class="{ 'opacity-60': !feature.is_active }">
                <CardHeader class="pb-3">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-2">
                            <Calculator class="h-5 w-5 text-primary" />
                            <CardTitle class="text-lg">{{ feature.name }}</CardTitle>
                        </div>
                        <DropdownMenu>
                            <DropdownMenuTrigger as-child>
                                <Button variant="ghost" size="icon" class="h-8 w-8">
                                    <MoreHorizontal class="h-4 w-4" />
                                </Button>
                            </DropdownMenuTrigger>
                            <DropdownMenuContent align="end">
                                <DropdownMenuItem as-child>
                                    <Link :href="edit({ 'calculator_feature': feature.id })" class="flex items-center">
                                        <Pencil class="mr-2 h-4 w-4" />
                                        Edit
                                    </Link>
                                </DropdownMenuItem>
                                <DropdownMenuItem
                                    @click="deleteFeature(feature.id)"
                                    class="text-red-600 flex items-center cursor-pointer"
                                >
                                    <Trash2 class="mr-2 h-4 w-4" />
                                    Hapus
                                </DropdownMenuItem>
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </div>
                    <div class="flex items-center gap-2 mt-1">
                        <Badge :variant="feature.category === 'feature' ? 'default' : 'secondary'">
                            {{ feature.category === 'feature' ? 'Fitur' : 'Layanan' }}
                        </Badge>
                        <Badge v-if="feature.is_recommended" variant="outline">Rekomendasi</Badge>
                    </div>
                </CardHeader>
                <CardContent>
                    <p v-if="feature.description" class="text-sm text-muted-foreground mb-3">
                        {{ feature.description }}
                    </p>
                    <div class="flex items-center justify-between text-sm">
                        <span class="font-semibold text-lg">{{ formatPrice(feature.price) }}</span>
                        <div class="flex items-center gap-2">
                            <CheckCircle v-if="feature.is_active" class="h-4 w-4 text-green-500" />
                            <XCircle v-else class="h-4 w-4 text-red-500" />
                            <span :class="feature.is_active ? 'text-green-600' : 'text-red-600'">
                                {{ feature.is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                    </div>
                </CardContent>
            </Card>

            <!-- Empty State -->
            <Card v-if="featureItems.length === 0" class="col-span-full">
                <CardContent class="flex flex-col items-center justify-center py-12 text-center">
                    <Calculator class="h-12 w-12 text-muted-foreground/50 mb-4" />
                    <h3 class="text-lg font-semibold">Belum ada fitur kalkulator</h3>
                    <p class="text-sm text-muted-foreground mt-1 mb-4">
                        Klik tombol "Tambah Fitur" untuk membuat fitur pertama Anda.
                    </p>
                    <Button as-child>
                        <Link :href="create()">
                            <Plus class="mr-2 h-4 w-4" />
                            Tambah Fitur
                        </Link>
                    </Button>
                </CardContent>
            </Card>
        </div>
    </div>
</template>
