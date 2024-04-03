//Componentes Base
import Home from './pages/Home.vue';
import FileList from './pages/folders/FolderList.vue';
import UserList from './pages/users/UserList.vue';

export default [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/fotos',
        name: 'FileList',
        component: FileList,
    },
    {
        path: '/usuarios',
        name: 'UserList',
        component: UserList,
    },
]
