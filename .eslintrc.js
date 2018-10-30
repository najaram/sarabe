module.exports = {
    extends: [
        "eslint:recommended",
        "plugin:prettier/recommended",
        'plugin:vue/recommended',
        "prettier"
    ],
    rules: {

    },
    globals: {
        _: true,
        $: true,
        axios: true,
        Vue: true,
        require: true
    },
};
