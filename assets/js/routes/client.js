import Main from "../client/main/Main";
import About from "../client/About";
import Login from "../client/auth/Login";
import Register from "../client/auth/Register";

export default [
    {path: '/', component: Main},
    {path: '/about', component: About},
    {path: '/login', component: Login},
    {path: '/register', component: Register},
];