package socket;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;
public class Server {
    int port;

    ServerSocket serverSocket;
    Socket socket;
    DataInputStream inputStream;
    DataOutputStream outputStream;

    //Server클래스 생성자
    public Server(int port){
        this.port = port;
        try{
            // ServerSocket 생성 & accept() 접속 대기 & Client와 통신을 위해 Socket반환
            socket = makeServer(port);

            System.out.println("연결됨");

            // 생성된 socket을 통해 입출력 스트림 생성
            inputStream = connectInputStream();
            outputStream = connectOutputStream();

            while(true){
                String msg = receiveMessageFromClient();
            //    sendMessageToClient(msg);
               System.out.println("클라이언트: " + msg);
                        }
        }catch (Exception e){

        } finally {
            // try {
            //     // serverSocket.close();
            // } catch (IOException ioException) {
            //     ioException.printStackTrace();
            // }
        }
    }

    //메인 함수
    public static void main(String[] args) {
        
        System.out.println("메인 함수 시작");

        new Server(3000);
        
    }

 

  


    public Socket makeServer(int port) throws IOException {
        serverSocket = new ServerSocket(port);//ServerSocket 생성
        socket = serverSocket.accept();//접속 대기

        return socket;//Client와 통신을 위한 Socket 반환
    }

    //생성된 socket을 통해 DataInputStream생성
    public DataInputStream connectInputStream() throws IOException {
        inputStream = new DataInputStream(socket.getInputStream());

        return inputStream;
    }

    //생성된 socket을 통해 DataOutputStream생성
    public DataOutputStream connectOutputStream() throws IOException {
        outputStream = new DataOutputStream(socket.getOutputStream());

        return outputStream;
    }

    public void sendMessageToClient(String msg) throws IOException {
        outputStream.writeUTF(msg);//생성된 출력 스트림을 통해 송신
    }

    public String receiveMessageFromClient() throws IOException {
        String msg = inputStream.readUTF();//생성된 입력 스트림을 통해 수신

        return msg;
    }

}
