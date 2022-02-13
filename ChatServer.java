import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;

public class ChatServer {
    
    
    private ServerSocket  server;
    
    //사용자 객체들을 관리하는 ArrayList
    
    ArrayList <UserClass> user_list;
    
    public static void main(String[] args) {
        new ChatServer();    
    }

    public ChatServer(){
        try {
            user_list = new ArrayList<UserClass>();
        
            //서버 가동
            server = new ServerSocket(3000);
    
            //사용자 접속 대기 스레드 가동
            ConnectionThread thread = new ConnectionThread();
            thread.start();
            
        } catch (Exception e) {
        }
    }

    //사용자 접속 대기를 처리하는 스레드 클래스
    class ConnectionThread extends Thread{

        @Override
        public void run(){
            try {
                while(true){
                    System.out.println("사용자 접속 대기");
                    Socket socket = server.accept();
                    System.out.println("사용자가 접속하였습니다.");

                    //사용자 닉네임을 처리하는 스레드 가동
                    NickNameThread thread = new NickNameThread(socket);
                    thread.start();
                }
            } catch (Exception e) {
            }
        }
}
//닉네임 입력처리 스레드
class NickNameThread extends Thread{
    private Socket socket;

    public NickNameThread(Socket socket){
        this.socket = socket;
    }

    public void run(){
        try {
            //스트림 추출
            InputStream is = socket.getInputStream();
            OutputStream os = socket.getOutputStream();
            DataInputStream dis = new DataInputStream(is);
            DataOutputStream dos = new DataOutputStream(os);

            // 닉네임 수신
            String nickName = dis.readUTF();
            // 환영 메시지를 전달한다ㅏ.
            dos.writeUTF(nickName+"님 환영합니다.");
            // 기존에 접속된 사용자들에게 접속 메세지를 전달한다.
            sendToClient("서버 : "+nickName+"님이 접속하였습니다.");
            // 사용자 정보를 관리하는 객체를 생성한다.
            UserClass user = new UserClass(nickName,socket);
            user.start();
            user_list.add(user);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}

// 사용자 정보를 관리하는 클래스
class UserClass extends Thread{
    String nickName;
    Socket socket;
    DataInputStream dis;
    DataOutputStream dos;

    public UserClass(String nickNmae,Socket socket){
        try {
            this.nickName = nickNmae;
            this.socket = socket;
            InputStream is = socket.getInputStream();
            OutputStream os = socket.getOutputStream();
            dis = new DataInputStream(is);
            dos = new DataOutputStream(os);

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    @Override
    public void run() {
        try {
            while(true){
                // 클라이언트에게 메세지를 수신받는다.
                String msg = dis.readUTF();
                // 사용자들에게 메시지를 전달한다.
                sendToClient(nickName+" : "+msg);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}

public synchronized void sendToClient(String msg){
    try {
        // 사용자의 수만큼 반복
        for(UserClass user : user_list){
            // 메세지를 클라이언트들에게 전달한다.
            user.dos.writeUTF(msg);
        }
    } catch (Exception e) {
        e.printStackTrace();
    }
}
}
