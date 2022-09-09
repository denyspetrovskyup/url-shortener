<template>
    <section class="form-wrapper">
        <div class="form">
            <form @submit.prevent="takeUrl">
                <div class="form-line">
                    <input class="url-input" type="url" v-model="url" placeholder="Url..."/>
                    <button class="send-button" :disabled="!url.length">Send</button>
                </div>
            </form>
        </div>
    </section>
</template>
<script>
export default {
    data() {
        return {
            url: ''
        }
    },
    methods: {
        async takeUrl() {
            fetch('/shorten', {
                method: "post",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    url: this.url
                })
            }).then((response) => {
                if (!response.ok) {
                    throw new Error(response.statusText)
                }
                return response.json()
            }).then((responseData) => {
                alert(responseData.shorten);
                this.url = ''
            }).catch(function (err) {
                alert('Sorry has any error: ' + err)
            })
        }
    }
}
</script>
<style lang="scss">
* {
    margin: 0;
    padding: 0;
}

body {
    background: #4a5568;
}

.form-wrapper {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;

    .form {
        display: flex;
        border-radius: 15px;
        background: #fff;
        padding: 30px;

        &-line {
            display: flex;
            justify-content: space-between;

            .send-button {
                margin: 5px;
                background: #718096;
                color: #fff;
                border-radius: 3px;
                padding: 5px 15px;
                border: 0;

                &:hover:enabled {
                    cursor: pointer;
                    background: #4f5968;
                }
            }

            .url-input {
                margin: 5px;
                color: #718096;
                border: 0;
                padding: 5px 15px;
            }
        }
    }
}
</style>
