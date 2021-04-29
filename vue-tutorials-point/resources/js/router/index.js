import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomeComponent from "../components/content/HomeComponent";
import AboutComponent from "../components/content/AboutComponent";
import ContactComponent from "../components/content/ContactComponent";
import ComputedPropertieComponent from "../components/vue/ComputedPropertieComponent";
import WatchComponent from "../components/vue/WatchComponent";
import BindingComponent from "../components/vue/BindingComponent";
import CustomerDetails from "../components/project/CustomerDetails";
import SpaComponent from "../components/project/SpaComponent";
import SingleFormComponent from "../components/project/SingleFormComponent";
import ContactFormComponent from "../components/project/ContactFormComponent";
import MultiFormComponent from "../components/project/MultiFormComponent";
import OopFormOne from "../components/oopForm/OopFormOne";
import CalenderComponent from "../components/ComboProject/CalenderComponent";
import demo from "../components/ComboProject/demo";

const routes = [
    {
        path:'/home',
        component:HomeComponent
    },

    {
        path: '/about',
        component: AboutComponent
    },

    {
        path: '/contact',
        component: ContactComponent
    },

    {
        path: '/computed-properties',
        component: ComputedPropertieComponent
    },

    {
        path: '/watch',
        component: WatchComponent
    },

    {
        path: '/binding',
        component: BindingComponent
    },
    //------------oop-routes------

    {
        path: '/oop-form-one',
        component: OopFormOne,
    },

    // -----------project-routes----------

    {
        path: '/customer-details',
        component: CustomerDetails
    },
    {
        path: '/spa',
        component: SpaComponent
    },
    {
        path: '/single-form',
        component: SingleFormComponent
    },
    {
        path: '/contact-form',
        component: ContactFormComponent
    },

    {
        path: '/multi-form',
        component: MultiFormComponent
    },

    // --------combo-project---------

    {
        path: '/calender',
        component: CalenderComponent
    },
    {
        path: '/demo',
        component: demo
    }
]

export default new VueRouter({
    // mode:'hash',
    mode:'history',
    routes
})
