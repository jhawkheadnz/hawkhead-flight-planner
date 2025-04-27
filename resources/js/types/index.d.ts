import type { PageProps } from '@inertiajs/core';
import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export interface SharedData extends PageProps {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface FlightPlan {
    id: number;
    name: string;
    description: string;
    created_at: string;
    updated_at: string;
}

export interface FlightPlanRoute {
    id: number;
    created_at: string;
    updated_at: string;
}

export interface Checklist {
    id: number;
    checklist_group_id: number;
    user_id: number;
    name: string;
    description: string;
    order: number;
    created_at: string;
    updated_at: string;
}

export interface ChecklistItem {
    id: number;
    checklist_id: number;
    user_id: number;
    title:string;
    description: string;
    is_visible: boolean;
    order: number;
    created_at: string;
    updated_at: string;
}

export interface ChecklistGroup {
    id:number;
    user_id:number;
    name:string;
    description:string;
    tag_name: string;
    order: number;
    created_at: string;
    updated_at: string;
}


export type BreadcrumbItemType = BreadcrumbItem;
