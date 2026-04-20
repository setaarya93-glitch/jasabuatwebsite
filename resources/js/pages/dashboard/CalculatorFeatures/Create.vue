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
import { index } from '@/routes/dashboard/calculator-features';
import { ArrowLeft, Calculator } from 'lucide-vue-next';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Kalkulator',
                href: index(),
            },
            {
                title: 'Tambah Fitur',
                href: '#',
            },
        ],
    },
});
</script>

<template>
    <Head title="Tambah Fitur Kalkulator" />

    <div class="flex flex-col space-y-6 max-w-2xl">
        <div class="flex items-center gap-4">
            <Button variant="outline" size="icon" as-child>
                <Link :href="index()">
                    <ArrowLeft class="h-4 w-4" />
                </Link>
            </Button>
            <div>
                <h1 class="text-2xl font-bold tracking-tight">Tambah Fitur</h1>
                <p class="text-muted-foreground">
                    Tambah fitur atau layanan baru ke kalkulator.
                </p>
            </div>
        </div>

        <form
            v-bind="CalculatorController.store.form()"
            class="space-y-6 rounded-lg border bg-card p-6"
        >
            <div class="grid gap-4 md:grid-cols-2">
                <div class="space-y-2">
                    <Label for="name">Nama Fitur <span class="text-red-500">*</span></Label>
                    <Input
                        id="name"
                        name="name"
                        placeholder="Contoh: Domain Custom"
                        required
                    />
                    <p class="text-xs text-muted-foreground">Nama yang akan ditampilkan di kalkulator.</p>
                </div>

                <div class="space-y-2">
                    <Label for="slug">Slug <span class="text-red-500">*</span></Label>
                    <Input
                        id="slug"
                        name="slug"
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
                        placeholder="150000"
                        required
                    />
                    <p class="text-xs text-muted-foreground">Gunakan 0 untuk fitur gratis.</p>
                </div>

                <div class="space-y-2">
                    <Label for="category">Kategori <span class="text-red-500">*</span></Label>
                    <Select name="category" default-value="feature">
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
                        value="0"
                    />
                    <p class="text-xs text-muted-foreground">Semakin kecil angka, semakin atas posisinya.</p>
                </div>
            </div>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <div class="flex items-center space-x-2">
                    <Checkbox id="is_recommended" name="is_recommended" value="1" />
                    <Label for="is_recommended" class="font-normal cursor-pointer">
                        Tandai sebagai rekomendasi
                    </Label>
                </div>

                <div class="flex items-center space-x-2">
                    <Checkbox id="is_active" name="is_active" value="1" checked />
                    <Label for="is_active" class="font-normal cursor-pointer">
                        Aktif
                    </Label>
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t">
                <Button type="submit">Simpan Fitur</Button>
                <Button variant="outline" as-child>
                    <Link :href="index()">Batal</Link>
                </Button>
            </div>
        </form>
    </div>
</template>
