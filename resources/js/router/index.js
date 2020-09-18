import BookListComponent from "../components/BookListComponent";
import OrderListComponent from "../components/OrderListComponent";
export default {
    mode: "history",

    routes: [
        {
            path: "/",
            name: "home",
            component: BookListComponent
        },
        {
            path: "/order",
            name: "order",
            component: OrderListComponent
        }
    ]
};
