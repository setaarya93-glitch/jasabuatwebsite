<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import { Checkbox } from '@/components/ui/checkbox';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import InputError from '@/components/InputError.vue';
import CalculatorController from '@/actions/App/Http/Controllers/Dashboard/CalculatorFeatureController';
import { index, update } from '@/routes/dashboard/calculator-features';
import { ArrowLeft, Calculator, Pencil } from 'lucide-vue-next';

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
    feature: Feature;
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Kalkulator',
                href: index(),
            },
            {
                title: 'Edit Fitur',
                href: '#',
            },
        ],
    },
});
</script>

<template>
    <Head title="Edit Fitur Kalkulator" />

    <div class="flex flex-col space-y-6 max-w-2xl">
        <div class="flex items-center gap-4">
            <Button variant="outline" size="icon" as-child>
                <Link :href="index()">
                    <ArrowLeft class="h-4 w-4" />
                </Link>
            </Button>
            <div>
                <h1 class="text-2xl font-bold tracking-tight">Edit Fitur</h1>
                <p class="text-muted-foreground">
                    Edit data fitur: <span class="font-medium text-foreground">{{ feature.name }}</span>
                </p>
            </div>
        </div>

        <form
            v-bind="CalculatorController.update.with({ 'calculator_feature': feature.id }).form({ 'calculator_feature': feature.id })"
            class="space-y-6 rounded-lg border bg-card p-6"
        >
            <div class="grid gap-4 md:grid-cols-2">
                <div class="space-y-2">
                    <Label for="name">Nama Fitur <span class="text-red-500">*</span></Label>
                    <Input
                        id="name"
                        name="name"
                        :default-value="feature.name"
                        placeholder="Contoh: Domain Custom"
                        required
                    />
                </div>

                <div class="space-y-2">
                    <Label for="slug">Slug <span class="text-red-500">*</span></Label>
                    <Input
                        id="slug"
                        name="slug"
                        :default-value="feature.slug"
                        placeholder="domain-custom"
                        required
                    />
                    <p class="text-xs text-muted-foreground">Identifier unik, gunakan huruf kecil dan tanda hubung.</p>
                </div>
            </div>

            <div class="space-y-2">
                <Label for="description">Deskripsi</Label>
                <Textarea
                    id="description"
                    name="description"
                    :default-value="feature.description || ''"
                    placeholder="Deskripsi singkat fitur ini..."
                    rows="3"
                />
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div class="space-y-2">
                    <Label for="price">Harga (Rp) <span class="text-red-500">*</span></Label>
                    <Input
                        id="price"
                        name="price"
                        type="number"
                        min="0"
                        :default-value="feature.price"
                        placeholder="150000"
                        required
                    />
                    <p class="text-xs text-muted-foreground">Gunakan 0 untuk fitur gratis.</p>
                </div>

                <div class="space-y-2">
                    <Label for="category">Kategori <span class="text-red-500">*</span></Label>
                    <Select name="category" :default-value="feature.category">
                        <SelectTrigger>
                            <SelectValue placeholder="Pilih kategori" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="feature">Fitur Website</SelectItem>
                            <SelectItem value="service">Layanan Dukungan</SelectItem>
                        </SelectContent>
                    </Select>
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div class="space-y-2">
                    <Label for="sort_order">Urutan</Label>
                    <Input
                        id="sort_order"
                        name="sort_order"
                        type="number"
                        min="0"
                        :default-value="feature.sort_order"
                    />
                    <p class="text-xs text-muted-foreground">Semakin kecil angka, semakin atas posisinya.</p>
                </div>
            </div>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <div class="flex items-center space-x-2">
                    <Checkbox
                        id="is_recommended"
                        name="is_recommended"
                        value="1"
                        :checked="feature.is_recommended"
                    />
                    <Label for="is_recommended" class="font-normal cursor-pointer">
                        Tandai sebagai rekomendasi
                    </Label>
                </div>

                <div class="flex items-center space-x-2">
                    <Checkbox
                        id="is_active"
                        name="is_active"
                        value="1"
                        :checked="feature.is_active"
                    />
                    <Label for="is_active" class="font-normal cursor-pointer">
                        Aktif
                    </Label>
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t">
                <Button type="submit">
                    <Pencil class="mr-2 h-4 w-4" />
                    Update Fitur
                </Button>
                <Button variant="outline" as-child>
                    <Link :href="index()">Batal</Link>
                </Button>
            </div>
        </form>
    </div>
</template>
