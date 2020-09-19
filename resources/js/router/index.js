import BookListComponent from "../components/BookListComponent";
import OrderListComponent from "../components/OrderListComponent";
import ChatPageComponent from "../components/chat/ChatPageComponent";
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
        },
        {
            path: "/chat",
            name: "chat",
            component: ChatPageComponent
        }
    ]
};
