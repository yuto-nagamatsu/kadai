import React, {useState, useEffect, useContext} from "react";
import * as Api from "../service/api"
import { signInWithGoogle } from "../service/firebase";
import dig from "object-dig"
import { AuthContext } from "../providers/AuthProvider";
import ToDoList from "./ToDoList";

const Dashboard = () => {
const currentUser = useContext(AuthContext);
const [inputName, setInputName] = useState("");
const [todos, setTodos] = useState([]);
console.log(inputName);
    console.log(todos);

useEffect(()=>{
    // Todo一覧を取得
    fetch();
}, [currentUser])

const fetch = async() => {
    if( dig(currentUser, 'currentUser', 'uid') ){
    const data = await Api.initGet(currentUser.currentUser.uid);
    await setTodos(data);
    }
}

const formRender = () => {
    let dom
    // もしログインしていたら、TODOの入力フォーム
    if( dig(currentUser, 'currentUser', 'uid') ){
    dom = <form>
        <input placeholder="ToDoName" value={inputName} onChange={(event) => setInputName(event.currentTarget.value)}/>
        <button type="button" onClick={() => post()} >追加</button>
    </form>
    }
    // else{
    // // もしログインしていない場合は、ログインボタン
    // dom = <button onClick={signInWithGoogle}>ログイン</button>
    // }
    return dom
}

const post = () => {
    Api.addTodo(inputName, currentUser.currentUser.uid);
    setInputName("");
    fetch();
}

return(
    <div>
    {formRender()}
    <ToDoList todos={todos} fetch={fetch}/>
    </div>
)
};
export default Dashboard;