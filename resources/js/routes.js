//Componentes Base
import Login from './pages/auth/Login.vue';
import FileList from './pages/folders/FolderList.vue';
import UserList from './pages/users/UserList.vue';

export default [
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/',
        name: 'FileList',
        component: FileList,
    },
    {
        path: '/inicio',
        name: 'FileList',
        component: FileList,
    },
    {
        path: '/usuarios',
        name: 'UserList',
        component: UserList,
    },
]
