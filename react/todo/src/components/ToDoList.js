import React, {useState, useEffect, useContext} from "react";
import * as Api from "../service/api"
import { signInWithGoogle } from "../service/firebase";
import dig from "object-dig"
import { AuthContext } from "../providers/AuthProvider";
import Checkbox from '@mui/material/Checkbox';
import Box, { BoxProps } from '@mui/material/Box';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemAvatar from '@mui/material/ListItemAvatar';
import ListItemIcon from '@mui/material/ListItemIcon';
import ListItemText from '@mui/material/ListItemText';
import ListItemSecondaryAction from '@mui/material/ListItemSecondaryAction';
import Avatar from '@mui/material/Avatar';
import IconButton from '@mui/material/IconButton';
import FormGroup from '@mui/material/FormGroup';
import FormControlLabel from '@mui/material/FormControlLabel';
import Grid from '@mui/material/Grid';
import Typography from '@mui/material/Typography';
import FolderIcon from '@mui/icons-material/Folder';
import DeleteIcon from '@mui/icons-material/Delete';


const label = { inputProps: { 'aria-label': 'Checkbox demo' } };

const ToDoList = (props) => {
    //const classes = useStyles();
    const deleteHandle = (id) => {
        Api.todoDelete(id);
        props.fetch();
    }
    const checkHandle = async (id) => {
        // Api経由でisCompelteの値を更新
        await Api.toggleComple(id);
        props.fetch();
    }

    
    // propsを元にliタグを作る
const todoList = props.todos.map((todo) => {
    return (
        <Box style={{
            //margin:'auto',
            //width:'50%'
            }}>     
            <ListItem key={todo.id}>
            <ListItemIcon>
                <Checkbox name="checkedA" />
                {/* <Checkbox checked="" onChange="" name="checkedA" /> */}
            </ListItemIcon>
            <ListItemText primary={todo.content} />
            <ListItemSecondaryAction>
                <IconButton edge="end" aria-label="delete" onClick={() => deleteHandle(todo.id)}>
                <DeleteIcon />
                </IconButton>
            </ListItemSecondaryAction>
            </ListItem>
        </Box>
    );
    });
    return (
    // <div className={classes.root}>
    //     <h2>あなたのToDo</h2>
    //     <ul className={classes.ul}>{todoList}</ul>
    // </div>
    <div>
    <h2>あなたのToDo</h2>
    <ul>{todoList}</ul>
    </div>
    )
}
    
export default ToDoList;
