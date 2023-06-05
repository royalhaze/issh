const allUrl = [
    {path: '/panel', name: 'dashboard', component: () => import(/* webpackChunkName: "PanelDashboard" */"../../components/DashboardComponent")},
   ];

export default allUrl;
