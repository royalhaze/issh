const allUrl = [
    {path: '/panel', name: 'dashboard', component: () => import(/* webpackChunkName: "PanelDashboard" */ "../../components/DashboardComponent")},
    {path: '/panel/users', name: 'users', component: () => import(/* webpackChunkName: "PanelUsers" */ "../../components/panel/UsersComponent")},
   ];

export default allUrl;
