<template>
    <nav>
        <div>
            <router-link to="/">home</router-link>
            <br />
            <router-link to="/about">about</router-link>
            <br />
            <router-link to="/form">Form</router-link>
        </div>
    </nav>
    <main>
        <router-view />
    </main>
</template>
